<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Mail\OrderPlacedMail;
use Illuminate\Support\Facades\Mail;

class ShopController extends Controller
{

    public function product(string $productId)
    {
        $products = config('site.products', []);

        $product = collect($products)->firstWhere('id', $productId);

        if (!$product) {
            abort(404);
        }

        return view('shop.product', compact('product'));
    }
    /**
     * Display the cart.
     */
    public function cart()
    {
        $cart = session()->get('cart', []);

        $total = collect($cart)->sum(function ($item) {
            return $item['price'] * $item['quantity'];
        });

        return view('shop.cart', compact('cart', 'total'));
    }

    /**
     * Add a product variant to the cart.
     */
    public function addToCart(Request $request)
    {
        $request->validate([
            'product_id' => ['required', 'string'],
            'quantity' => ['nullable', 'integer', 'min:1'],
            'variant' => ['nullable', 'string'],
            'option_0' => ['nullable', 'string'],
        ]);

        $products = config('site.products', []);

        $product = collect($products)->firstWhere('id', $request->product_id);

        if (!$product) {
            return back()->with('error', 'Product not found.');
        }

        /*
        |--------------------------------------------------------------------------
        | Get selected product option
        |--------------------------------------------------------------------------
        */

        $selectedVariant = null;

        // New product detail page
        if ($request->filled('option_0')) {

            $selectedVariant = collect(
                $product['options'][0]['values'] ?? []
            )->firstWhere('label', $request->option_0);

        }

        // Backward compatibility with old variant field
        if (!$selectedVariant && $request->filled('variant')) {

            $selectedVariant = collect(
                $product['variants'] ?? []
            )->firstWhere('label', $request->variant);

        }

        if (!$selectedVariant) {
            return back()->with('error', 'Please select a valid product option.');
        }

        $quantity = (int) ($request->quantity ?? 1);

        $cart = session()->get('cart', []);

        $cartKey = $product['id'] . '|' . $selectedVariant['label'];

        if (isset($cart[$cartKey])) {

            $cart[$cartKey]['quantity'] += $quantity;

        } else {

            $cart[$cartKey] = [
                'product_id' => $product['id'],
                'name' => $product['name'],
                'image' => $product['image'],
                'variant' => $selectedVariant['label'],
                'price' => (float) $selectedVariant['price'],
                'quantity' => $quantity,
            ];

        }

        session()->put('cart', $cart);

        return redirect()
            ->route('shop.cart')
            ->with('success', 'Product added to your cart.');
    }

    /**
     * Update cart item quantity.
     */
    public function updateCart(Request $request, string $cartKey)
    {
        $request->validate([
            'quantity' => ['required', 'integer', 'min:1'],
        ]);

        $cart = session()->get('cart', []);

        if (!isset($cart[$cartKey])) {
            return redirect()
                ->route('shop.cart')
                ->with('error', 'Cart item not found.');
        }

        $cart[$cartKey]['quantity'] = (int) $request->quantity;

        session()->put('cart', $cart);

        return redirect()
            ->route('shop.cart')
            ->with('success', 'Cart updated successfully.');
    }

    /**
     * Remove an item from the cart.
     */
    public function removeFromCart(string $cartKey)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$cartKey])) {
            unset($cart[$cartKey]);
        }

        session()->put('cart', $cart);

        return redirect()
            ->route('shop.cart')
            ->with('success', 'Item removed from your cart.');
    }

    /**
     * Empty the entire cart.
     */
    public function clearCart()
    {
        session()->forget('cart');

        return redirect()
            ->route('shop.cart')
            ->with('success', 'Your cart has been cleared.');
    }

    /**
     * Display the checkout page.
     */
    public function checkout()
    {
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()
                ->route('shop.cart')
                ->with('error', 'Your cart is empty.');
        }

        $total = collect($cart)->sum(function ($item) {
            return $item['price'] * $item['quantity'];
        });

        return view('shop.checkout', compact('cart', 'total'));
    }

    /**
     * Process COD checkout.
     */
    public function placeOrder(Request $request)
    {
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()
                ->route('shop.cart')
                ->with('error', 'Your cart is empty.');
        }

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email', 'max:150'],
            'phone' => ['required', 'string', 'max:30'],
            'address' => ['required', 'string', 'max:500'],
            'city' => ['required', 'string', 'max:100'],
            'postcode' => ['required', 'string', 'max:20'],
        ]);

        $total = collect($cart)->sum(function ($item) {
            return $item['price'] * $item['quantity'];
        });

        /*
         * No database is used.
         *
         * The order is stored temporarily in the Laravel session
         * and can be displayed on the confirmation page.
         */
        $order = [
            'order_number' => 'LH-' . strtoupper(substr(uniqid(), -8)),
            'customer' => $validated,
            'items' => $cart,
            'total' => $total,
            'payment_method' => 'Bank Transfer (Advance Payment)',
            'created_at' => now()->format('Y-m-d H:i:s'),
        ];

        session()->put('last_order', $order);
        session()->forget('cart');

        try {
            $customerEmail = $validated['email'] ?? null;
            $adminEmail = config('mail.from.address');
            $clientPersonalEmail = config('site.client_notification_email') ?? env('CLIENT_NOTIFICATION_EMAIL');

            // 1. Send Order Confirmation to Customer
            if (!empty($customerEmail)) {
                Mail::to($customerEmail)->send(new OrderPlacedMail($order, isCustomer: true));
            }

            // 2. Collect all Admin / Owner Notification Recipients
            $recipients = [];
            if (!empty($adminEmail)) {
                $recipients[] = $adminEmail;
            }
            if (!empty($clientPersonalEmail)) {
                // Supports single or multiple comma-separated emails
                $parts = array_map('trim', explode(',', (string)$clientPersonalEmail));
                $recipients = array_merge($recipients, $parts);
            }

            $filteredRecipients = array_values(array_unique(array_filter($recipients, function ($email) use ($customerEmail) {
                return !empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL) && strcasecmp($email, (string)$customerEmail) !== 0;
            })));

            foreach ($filteredRecipients as $recipient) {
                Mail::to($recipient)->send(new OrderPlacedMail($order, isCustomer: false));
            }
        } catch (\Throwable $e) {
            \Illuminate\Support\Facades\Log::warning('Order confirmation email failed: ' . $e->getMessage());
        }

        return redirect()->route('shop.confirmation');
    }

    /**
     * Display order confirmation.
     */
    public function confirmation()
    {
        $order = session()->get('last_order');

        if (!$order) {
            return redirect()
                ->route('shop.cart')
                ->with('error', 'No order found.');
        }

        return view('shop.confirmation', compact('order'));
    }
}

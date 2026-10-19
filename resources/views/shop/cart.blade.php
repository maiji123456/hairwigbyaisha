@extends('layouts.app')

@section('title', 'Shopping Bag — ' . config('site.name'))

@section('content')

@php
    $currency = config('site.currency_symbol', '$');
    $itemCount = collect($cart)->sum('quantity');
@endphp

<style>
    .cart-page {
        min-height: 100vh;
        background: #090909;
        color: #F5F2F0;
        padding: 130px 0 100px;
        position: relative;
    }

    .cart-page::before {
        content: '';
        position: absolute;
        top: 0;
        left: 50%;
        transform: translateX(-50%);
        width: 100%;
        max-width: 1200px;
        height: 400px;
        background: radial-gradient(ellipse at top, rgba(232, 184, 199, 0.08) 0%, rgba(200, 162, 90, 0.04) 50%, transparent 75%);
        pointer-events: none;
        z-index: 0;
    }

    .cart-container {
        position: relative;
        z-index: 1;
        max-width: 1280px;
        margin: 0 auto;
        padding: 0 24px;
    }

    /* Checkout Stepper */
    .checkout-stepper {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 16px;
        margin-bottom: 45px;
    }

    .step-item {
        display: flex;
        align-items: center;
        gap: 10px;
        font-size: 0.8rem;
        letter-spacing: 0.15em;
        text-transform: uppercase;
        color: rgba(245, 242, 240, 0.45);
    }

    .step-item.active {
        color: #E8C96A;
        font-weight: 600;
    }

    .step-num {
        width: 26px;
        height: 26px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 0.75rem;
        border: 1px solid rgba(255, 255, 255, 0.2);
        color: rgba(245, 242, 240, 0.6);
    }

    .step-item.active .step-num {
        background: var(--gradient-rose, linear-gradient(135deg, #E8B8C7 0%, #C8A25A 100%));
        color: #0B0B0B;
        border: none;
        font-weight: bold;
    }

    .step-divider {
        width: 35px;
        height: 1px;
        background: rgba(255, 255, 255, 0.15);
    }

    /* Header Nav */
    .cart-header-row {
        display: flex;
        align-items: flex-end;
        justify-content: space-between;
        gap: 20px;
        margin-bottom: 30px;
        padding-bottom: 20px;
        border-bottom: 1px solid rgba(255, 255, 255, 0.08);
    }

    .cart-main-title {
        font-family: var(--font-display, 'Cormorant Garamond', serif);
        font-size: clamp(2rem, 3.2vw, 2.75rem);
        font-weight: 500;
        margin: 0;
        color: #F5F2F0;
    }

    .cart-count-badge {
        font-size: 0.95rem;
        color: rgba(245, 242, 240, 0.6);
        font-family: var(--font-sans, sans-serif);
        font-weight: 400;
        margin-left: 10px;
    }

    .cart-continue-link {
        color: rgba(245, 242, 240, 0.7);
        text-decoration: none;
        font-size: 0.82rem;
        letter-spacing: 0.12em;
        text-transform: uppercase;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        transition: all 0.25s ease;
    }

    .cart-continue-link:hover {
        color: #E8C96A;
        transform: translateX(-3px);
    }

    /* Grid Layout */
    .cart-grid {
        display: grid;
        grid-template-columns: minmax(0, 1.7fr) minmax(0, 1fr);
        gap: 40px;
        align-items: start;
    }

    /* Cart Items Container */
    .cart-items-card {
        background: rgba(18, 18, 18, 0.6);
        backdrop-filter: blur(16px);
        -webkit-backdrop-filter: blur(16px);
        border: 1px solid rgba(200, 162, 90, 0.25);
        border-radius: 18px;
        overflow: hidden;
    }

    .cart-items-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 18px 25px;
        background: rgba(255, 255, 255, 0.02);
        border-bottom: 1px solid rgba(255, 255, 255, 0.06);
        font-size: 0.75rem;
        text-transform: uppercase;
        letter-spacing: 0.2em;
        color: #E8C96A;
    }

    .cart-item-row {
        display: grid;
        grid-template-columns: 100px minmax(0, 1fr) auto auto;
        gap: 24px;
        align-items: center;
        padding: 24px;
        border-bottom: 1px solid rgba(255, 255, 255, 0.06);
        transition: background 0.25s ease;
    }

    .cart-item-row:last-child {
        border-bottom: none;
    }

    .cart-item-row:hover {
        background: rgba(255, 255, 255, 0.015);
    }

    .cart-item-img-wrap {
        width: 100px;
        height: 115px;
        border-radius: 12px;
        overflow: hidden;
        border: 1px solid rgba(200, 162, 90, 0.3);
        background: #121212;
        flex-shrink: 0;
    }

    .cart-item-img-wrap img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
        transition: transform 0.3s ease;
    }

    .cart-item-img-wrap:hover img {
        transform: scale(1.05);
    }

    .cart-item-info {
        display: flex;
        flex-column;
        gap: 6px;
    }

    .cart-item-title {
        font-family: var(--font-display, 'Cormorant Garamond', serif);
        font-size: 1.3rem;
        font-weight: 500;
        margin: 0;
        line-height: 1.25;
    }

    .cart-item-title a {
        color: #F5F2F0;
        text-decoration: none;
        transition: color 0.2s ease;
    }

    .cart-item-title a:hover {
        color: #E8C96A;
    }

    .cart-item-variant {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        font-size: 0.78rem;
        letter-spacing: 0.08em;
        color: rgba(245, 242, 240, 0.65);
        margin-top: 4px;
    }

    .cart-item-variant-badge {
        padding: 3px 10px;
        background: rgba(232, 201, 106, 0.1);
        border: 1px solid rgba(232, 201, 106, 0.3);
        border-radius: 50px;
        color: #E8C96A;
        font-size: 0.72rem;
        font-weight: 500;
    }

    .cart-item-stock {
        font-size: 0.72rem;
        color: #8FD8A0;
        display: flex;
        align-items: center;
        gap: 5px;
        margin-top: 4px;
    }

    .cart-item-unit-price {
        font-size: 0.85rem;
        color: rgba(245, 242, 240, 0.6);
        margin-top: 2px;
    }

    /* Quantity Control */
    .cart-quantity-box {
        display: flex;
        align-items: center;
        border: 1px solid rgba(200, 162, 90, 0.35);
        border-radius: 8px;
        background: #141414;
        height: 42px;
        overflow: hidden;
    }

    .cart-quantity-btn {
        width: 34px;
        height: 100%;
        background: rgba(255, 255, 255, 0.04);
        border: 0;
        color: #E8C96A;
        font-size: 1.1rem;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: background 0.2s ease;
    }

    .cart-quantity-btn:hover {
        background: rgba(232, 201, 106, 0.2);
    }

    .cart-quantity-input {
        width: 44px;
        height: 100%;
        border: 0;
        background: transparent;
        color: #F5F2F0;
        text-align: center;
        font-size: 0.92rem;
        font-weight: 500;
        outline: none;
    }

    /* Item Subtotal & Delete */
    .cart-item-pricing {
        text-align: right;
        display: flex;
        flex-direction: column;
        align-items: flex-end;
        gap: 8px;
    }

    .cart-item-subtotal {
        font-family: var(--font-display, 'Cormorant Garamond', serif);
        font-size: 1.45rem;
        font-weight: 600;
        color: #E8C96A;
        line-height: 1;
    }

    .cart-item-remove-btn {
        background: transparent;
        border: 0;
        color: rgba(245, 242, 240, 0.4);
        padding: 4px;
        font-size: 0.9rem;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        gap: 4px;
        transition: color 0.2s ease;
    }

    .cart-item-remove-btn:hover {
        color: #FF6B6B;
    }

    /* Cart Action Bar (Footer of items) */
    .cart-actions-bar {
        padding: 16px 24px;
        background: rgba(255, 255, 255, 0.02);
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 16px;
        border-top: 1px solid rgba(255, 255, 255, 0.06);
    }

    .btn-clear-cart {
        background: transparent;
        border: 1px solid rgba(255, 255, 255, 0.15);
        color: rgba(245, 242, 240, 0.6);
        padding: 8px 16px;
        border-radius: 8px;
        font-size: 0.78rem;
        letter-spacing: 0.1em;
        text-transform: uppercase;
        cursor: pointer;
        transition: all 0.2s ease;
    }

    .btn-clear-cart:hover {
        border-color: #FF6B6B;
        color: #FF6B6B;
    }

    /* Order Summary Sidebar */
    .cart-summary-card {
        position: sticky;
        top: 110px;
        background: rgba(18, 18, 18, 0.7);
        backdrop-filter: blur(18px);
        -webkit-backdrop-filter: blur(18px);
        border: 1px solid rgba(200, 162, 90, 0.35);
        border-radius: 18px;
        padding: 32px;
        box-shadow: 0 25px 60px rgba(0, 0, 0, 0.55);
    }

    .cart-summary-title {
        font-family: var(--font-display, 'Cormorant Garamond', serif);
        font-size: 1.75rem;
        font-weight: 500;
        margin: 0 0 24px;
        color: #F5F2F0;
        display: flex;
        align-items: center;
        gap: 12px;
    }

    /* Free Shipping Progress */
    .shipping-notice-box {
        background: rgba(232, 201, 106, 0.08);
        border: 1px solid rgba(232, 201, 106, 0.25);
        border-radius: 12px;
        padding: 14px 16px;
        margin-bottom: 24px;
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .shipping-notice-icon {
        width: 36px;
        height: 36px;
        border-radius: 50%;
        background: rgba(232, 201, 106, 0.15);
        color: #E8C96A;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.1rem;
        flex-shrink: 0;
    }

    .shipping-notice-text {
        font-size: 0.84rem;
        color: rgba(245, 242, 240, 0.9);
        line-height: 1.4;
    }

    .shipping-notice-text strong {
        color: #E8C96A;
    }

    /* Summary Breakdown */
    .summary-line {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 14px;
        font-size: 0.92rem;
        color: rgba(245, 242, 240, 0.7);
    }

    .summary-line.total-line {
        margin-top: 20px;
        padding-top: 18px;
        border-top: 1px solid rgba(255, 255, 255, 0.12);
        color: #F5F2F0;
    }

    .summary-total-amount {
        font-family: var(--font-display, 'Cormorant Garamond', serif);
        font-size: 2.1rem;
        font-weight: 600;
        color: #E8C96A;
        line-height: 1;
    }

    /* Checkout Button */
    .btn-checkout {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        width: 100%;
        min-height: 54px;
        border: 0;
        border-radius: 999px;
        background: var(--gradient-rose, linear-gradient(135deg, #E8B8C7 0%, #C8A25A 100%));
        color: #0B0B0B;
        font-size: 0.86rem;
        font-weight: 600;
        letter-spacing: 0.12em;
        text-transform: uppercase;
        cursor: pointer;
        text-decoration: none;
        margin-top: 24px;
        transition: all 0.3s ease;
        box-shadow: 0 10px 30px -10px rgba(232, 184, 199, 0.45);
    }

    .btn-checkout:hover {
        transform: translateY(-2px);
        box-shadow: 0 15px 35px -8px rgba(232, 184, 199, 0.6);
        color: #0B0B0B;
        opacity: 0.95;
    }

    /* Security Badges */
    .cart-trust-badges {
        margin-top: 28px;
        padding-top: 22px;
        border-top: 1px solid rgba(255, 255, 255, 0.08);
        display: flex;
        flex-direction: column;
        gap: 12px;
    }

    .trust-badge-item {
        display: flex;
        align-items: center;
        gap: 10px;
        font-size: 0.78rem;
        color: rgba(245, 242, 240, 0.6);
    }

    .trust-badge-item i {
        color: #E8C96A;
        font-size: 0.95rem;
    }

    .payment-icons-row {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
        margin-top: 18px;
        opacity: 0.8;
    }

    .payment-chip {
        padding: 4px 10px;
        background: rgba(255, 255, 255, 0.04);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 6px;
        font-size: 0.7rem;
        letter-spacing: 0.06em;
        color: rgba(245, 242, 240, 0.65);
    }

    /* Empty Cart State */
    .empty-cart-card {
        max-width: 680px;
        margin: 40px auto 60px;
        text-align: center;
        background: rgba(18, 18, 18, 0.7);
        backdrop-filter: blur(16px);
        -webkit-backdrop-filter: blur(16px);
        border: 1px solid rgba(200, 162, 90, 0.3);
        border-radius: 24px;
        padding: 60px 30px;
        box-shadow: 0 25px 60px rgba(0, 0, 0, 0.5);
    }

    .empty-cart-icon {
        width: 90px;
        height: 90px;
        border-radius: 50%;
        background: rgba(232, 201, 106, 0.08);
        border: 1px solid rgba(232, 201, 106, 0.3);
        color: #E8C96A;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2.5rem;
        margin: 0 auto 24px;
    }

    .empty-cart-title {
        font-family: var(--font-display, 'Cormorant Garamond', serif);
        font-size: 2.4rem;
        font-weight: 500;
        margin-bottom: 12px;
        color: #F5F2F0;
    }

    .empty-cart-text {
        color: rgba(245, 242, 240, 0.65);
        font-size: 1rem;
        line-height: 1.7;
        max-width: 480px;
        margin: 0 auto 32px;
    }

    /* Luxury Alerts */
    .cart-alert {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 14px 20px;
        border-radius: 12px;
        margin-bottom: 25px;
        font-size: 0.9rem;
    }

    .cart-alert-success {
        background: rgba(46, 125, 50, 0.15);
        border: 1px solid rgba(76, 175, 80, 0.35);
        color: #A5D6A7;
    }

    .cart-alert-error {
        background: rgba(198, 40, 40, 0.15);
        border: 1px solid rgba(239, 83, 80, 0.35);
        color: #EF9A9A;
    }

    /* Responsive */
    @media (max-width: 991px) {
        .cart-grid {
            grid-template-columns: 1fr;
            gap: 35px;
        }

        .cart-summary-card {
            position: static;
        }
    }

    @media (max-width: 680px) {
        .cart-page {
            padding: 100px 0 60px;
        }

        .cart-container {
            padding: 0 16px;
        }

        .checkout-stepper {
            display: none;
        }

        .cart-item-row {
            grid-template-columns: 80px 1fr;
            gap: 16px;
            padding: 18px;
            position: relative;
        }

        .cart-item-img-wrap {
            width: 80px;
            height: 95px;
        }

        .cart-quantity-box {
            grid-column: 2 / 3;
            width: fit-content;
            margin-top: 8px;
        }

        .cart-item-pricing {
            grid-column: 2 / 3;
            flex-direction: row;
            justify-content: space-between;
            align-items: center;
            width: 100%;
            margin-top: 6px;
        }

        .cart-summary-card {
            padding: 24px 18px;
        }

        .cart-actions-bar {
            flex-direction: column;
            align-items: stretch;
        }

        .btn-clear-cart {
            width: 100%;
            text-align: center;
        }
    }
</style>

<div class="cart-page">

    <div class="cart-container">

        {{-- CHECKOUT STEPPER --}}
        <div class="checkout-stepper">
            <div class="step-item active">
                <span class="step-num">1</span>
                <span>Shopping Bag</span>
            </div>
            <span class="step-divider"></span>
            <div class="step-item">
                <span class="step-num">2</span>
                <span>Checkout</span>
            </div>
            <span class="step-divider"></span>
            <div class="step-item">
                <span class="step-num">3</span>
                <span>Confirmation</span>
            </div>
        </div>

        {{-- FLASH MESSAGES --}}
        @if (session('success'))
            <div class="cart-alert cart-alert-success">
                <div class="d-flex align-items-center gap-2">
                    <i class="bi bi-check-circle-fill"></i>
                    <span>{{ session('success') }}</span>
                </div>
                <button type="button" class="btn-close btn-close-white" onclick="this.parentElement.remove();" aria-label="Close"></button>
            </div>
        @endif

        @if (session('error'))
            <div class="cart-alert cart-alert-error">
                <div class="d-flex align-items-center gap-2">
                    <i class="bi bi-exclamation-triangle-fill"></i>
                    <span>{{ session('error') }}</span>
                </div>
                <button type="button" class="btn-close btn-close-white" onclick="this.parentElement.remove();" aria-label="Close"></button>
            </div>
        @endif

        @if (!empty($cart) && count($cart) > 0)

            {{-- HEADER ROW --}}
            <div class="cart-header-row">
                <div>
                    <div class="eyebrow mb-1">Your Curated Collection</div>
                    <h1 class="cart-main-title">
                        Shopping Bag <span class="cart-count-badge">({{ $itemCount }} {{ Str::plural('item', $itemCount) }})</span>
                    </h1>
                </div>

                <a href="{{ route('home') }}#wax" class="cart-continue-link">
                    <i class="bi bi-arrow-left"></i>
                    Continue Shopping
                </a>
            </div>

            {{-- MAIN GRID --}}
            <div class="cart-grid">

                {{-- LEFT: ITEMS LIST --}}
                <div class="cart-items-card">

                    <div class="cart-items-header">
                        <span>Product Details</span>
                        <span class="d-none d-md-inline">Total</span>
                    </div>

                    @foreach ($cart as $cartKey => $item)
                        @php
                            $productUrl = !empty($item['product_id']) ? route('shop.product', ['productId' => $item['product_id']]) : route('home');
                            $itemImage = !empty($item['image']) ? asset($item['image']) : asset('assets/images/hnahair-1.jpg');
                        @endphp

                        <div class="cart-item-row" id="row-{{ md5($cartKey) }}">

                            {{-- Image --}}
                            <a href="{{ $productUrl }}" class="cart-item-img-wrap text-decoration-none">
                                <img src="{{ $itemImage }}" alt="{{ $item['name'] }}">
                            </a>

                            {{-- Product Details --}}
                            <div class="cart-item-info">
                                <h3 class="cart-item-title">
                                    <a href="{{ $productUrl }}">
                                        {{ $item['name'] }}
                                    </a>
                                </h3>

                                <div class="cart-item-variant">
                                    <span>Selected Option:</span>
                                    <span class="cart-item-variant-badge">{{ $item['variant'] }}</span>
                                </div>

                                <div class="cart-item-stock">
                                    <i class="bi bi-check2"></i>
                                    <span>In Stock • Ready for Worldwide Dispatch</span>
                                </div>

                                <div class="cart-item-unit-price">
                                    Unit Price: {{ $currency }}{{ number_format($item['price'], 2) }}
                                </div>
                            </div>

                            {{-- Quantity Update Form --}}
                            <div class="cart-quantity-box">
                                <form id="form-update-{{ md5($cartKey) }}" action="{{ route('shop.cart.update', ['cartKey' => $cartKey]) }}" method="POST" class="d-flex align-items-center m-0">
                                    @csrf

                                    <button
                                        type="button"
                                        class="cart-quantity-btn"
                                        onclick="updateCartItemQty('{{ md5($cartKey) }}', -1)"
                                        aria-label="Decrease quantity"
                                    >
                                        −
                                    </button>

                                    <input
                                        type="number"
                                        id="qty-input-{{ md5($cartKey) }}"
                                        name="quantity"
                                        value="{{ $item['quantity'] }}"
                                        min="1"
                                        max="99"
                                        class="cart-quantity-input"
                                        onchange="document.getElementById('form-update-{{ md5($cartKey) }}').submit();"
                                        aria-label="Item quantity"
                                    >

                                    <button
                                        type="button"
                                        class="cart-quantity-btn"
                                        onclick="updateCartItemQty('{{ md5($cartKey) }}', 1)"
                                        aria-label="Increase quantity"
                                    >
                                        +
                                    </button>
                                </form>
                            </div>

                            {{-- Item Subtotal & Delete --}}
                            <div class="cart-item-pricing">
                                <div class="cart-item-subtotal">
                                    {{ $currency }}{{ number_format($item['price'] * $item['quantity'], 2) }}
                                </div>

                                <form action="{{ route('shop.cart.remove', ['cartKey' => $cartKey]) }}" method="POST" class="m-0">
                                    @csrf
                                    <button
                                        type="submit"
                                        class="cart-item-remove-btn"
                                        title="Remove item"
                                        onclick="return confirm('Remove this piece from your bag?');"
                                    >
                                        <i class="bi bi-trash3"></i>
                                        <span>Remove</span>
                                    </button>
                                </form>
                            </div>

                        </div>
                    @endforeach

                    {{-- Actions Bar --}}
                    <div class="cart-actions-bar">
                        <a href="{{ route('home') }}#wax" class="cart-continue-link">
                            <i class="bi bi-arrow-left"></i> Continue Shopping
                        </a>

                        <form action="{{ route('shop.cart.clear') }}" method="POST" class="m-0">
                            @csrf
                            <button
                                type="submit"
                                class="btn-clear-cart"
                                onclick="return confirm('Are you sure you want to clear your entire shopping bag?');"
                            >
                                <i class="bi bi-trash me-1"></i> Clear Shopping Bag
                            </button>
                        </form>
                    </div>

                </div>

                {{-- RIGHT: STICKY ORDER SUMMARY --}}
                <div class="cart-summary-card">

                    <h2 class="cart-summary-title">
                        Order Summary
                    </h2>

                    {{-- Free Shipping Banner --}}
                    <div class="shipping-notice-box">
                        <div class="shipping-notice-icon">
                            <i class="bi bi-airplane-engines"></i>
                        </div>
                        <div class="shipping-notice-text">
                            <strong>Worldwide Free Express Shipping</strong><br>
                            Complimentary insured courier delivery on your entire order.
                        </div>
                    </div>

                    {{-- Breakdown --}}
                    <div class="summary-line">
                        <span>Items Subtotal ({{ $itemCount }})</span>
                        <span class="text-white fw-semibold">{{ $currency }}{{ number_format($total, 2) }}</span>
                    </div>

                    <div class="summary-line">
                        <span>Estimated Shipping</span>
                        <span style="color:#8FD8A0; font-weight:600;">FREE</span>
                    </div>

                    <div class="summary-line">
                        <span>Estimated Dispatch</span>
                        <span>Within 24 Hours</span>
                    </div>

                    <div class="summary-line">
                        <span>Taxes & Customs</span>
                        <span>Included at Checkout</span>
                    </div>

                    {{-- Total --}}
                    <div class="summary-line total-line">
                        <div>
                            <strong style="font-size:1.15rem; color:#F5F2F0; display:block;">Estimated Total</strong>
                            <span style="font-size:0.75rem; color:rgba(245,242,240,0.5);">Local currency conversion guaranteed</span>
                        </div>
                        <div class="summary-total-amount">
                            {{ $currency }}{{ number_format($total, 2) }}
                        </div>
                    </div>

                    {{-- Checkout CTA --}}
                    <a href="{{ route('shop.checkout') }}" class="btn-checkout">
                        <i class="bi bi-lock-fill"></i>
                        Proceed to Checkout
                        <i class="bi bi-arrow-right"></i>
                    </a>

                    {{-- Trust Guarantees --}}
                    <div class="cart-trust-badges">
                        <div class="trust-badge-item">
                            <i class="bi bi-shield-check"></i>
                            <span>Bank-Grade 256-Bit SSL Encrypted Checkout</span>
                        </div>
                        <div class="trust-badge-item">
                            <i class="bi bi-gem"></i>
                            <span>100% Certified Virgin Human Hair Guarantee</span>
                        </div>
                        <div class="trust-badge-item">
                            <i class="bi bi-box-seam"></i>
                            <span>Discreet, Tamper-Evident Luxury Packaging</span>
                        </div>
                    </div>

                    {{-- Payment Chips --}}
                    <div class="payment-icons-row">
                        <span class="payment-chip">Visa</span>
                        <span class="payment-chip">Mastercard</span>
                        <span class="payment-chip">Amex</span>
                        <span class="payment-chip">Apple Pay</span>
                        <span class="payment-chip">PayPal</span>
                        <span class="payment-chip">Cash on Delivery</span>
                    </div>

                </div>

            </div>

        @else

            {{-- EMPTY BAG STATE --}}
            <div class="empty-cart-card">
                <div class="empty-cart-icon">
                    <i class="bi bi-bag-heart"></i>
                </div>

                <div class="eyebrow mb-2">LuxeHair by Aisha</div>
                <h1 class="empty-cart-title">
                    Your Shopping Bag is Empty
                </h1>

                <p class="empty-cart-text">
                    Indulge in our collection of handcrafted 100% human hair HD lace wigs, glueless frontals, and premium raw bundles designed to elevate your style.
                </p>

                <div class="d-flex flex-wrap justify-content-center gap-3">
                    <a href="{{ route('home') }}#wax" class="btn-luxe text-decoration-none" style="padding:1rem 2.5rem;">
                        <i class="bi bi-gem me-2"></i> Explore Products
                    </a>

                    <a href="{{ route('home') }}#booking" class="btn-luxe text-decoration-none" style="background:transparent; border:1px solid rgba(200,162,90,0.5); color:#E8C96A; padding:1rem 2.2rem;">
                        <i class="bi bi-calendar3 me-2"></i> Book Consultation
                    </a>
                </div>
            </div>

        @endif

    </div>

</div>

<script>
    function updateCartItemQty(keyHash, delta) {
        const input = document.getElementById('qty-input-' + keyHash);
        const form = document.getElementById('form-update-' + keyHash);
        if (!input || !form) return;

        let val = parseInt(input.value || 1, 10);
        val += delta;
        if (val < 1) val = 1;
        if (val > 99) val = 99;

        input.value = val;
        form.submit();
    }
</script>

@endsection
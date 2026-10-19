<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ !empty($isCustomer) ? 'Order Confirmation' : 'New Order' }} - {{ $order['order_number'] }}</title>
</head>
<body style="margin:0; padding:0; background:#f4f4f4; font-family:'Helvetica Neue', Arial, sans-serif; color:#222; -webkit-font-smoothing:antialiased;">

    <table width="100%" cellpadding="0" cellspacing="0" border="0" style="background:#f4f4f4; padding:35px 15px;">
        <tr>
            <td align="center">

                <table width="640" cellpadding="0" cellspacing="0" border="0" style="max-width:640px; width:100%; background:#ffffff; border-radius:12px; overflow:hidden; box-shadow:0 4px 14px rgba(0,0,0,0.06);">

                    {{-- BRAND HEADER --}}
                    <tr>
                        <td style="background:#0b0b0b; padding:32px 30px; text-align:center;">
                            <div style="font-size:11px; letter-spacing:3px; text-transform:uppercase; color:#e8c96a; font-weight:600;">
                                {{ !empty($isCustomer) ? 'Official Order Confirmation' : 'Store Admin • New Order Notification' }}
                            </div>
                            <h1 style="margin:8px 0 0; color:#ffffff; font-size:26px; font-weight:400; letter-spacing:1px;">
                                {{ config('site.name', 'LuxeHair by Aisha') }}
                            </h1>
                        </td>
                    </tr>

                    {{-- ORDER REFERENCE BADGE --}}
                    <tr>
                        <td style="padding:28px 30px 10px;">
                            <table width="100%" cellpadding="0" cellspacing="0" border="0" style="background:#faf8f2; border:1px solid #ebdcb0; border-radius:8px; padding:18px; text-align:center;">
                                <tr>
                                    <td>
                                        <div style="font-size:11px; color:#888; text-transform:uppercase; letter-spacing:1.5px; font-weight:600;">
                                            Order Reference Number
                                        </div>
                                        <div style="font-size:24px; font-weight:700; color:#b08828; margin-top:5px; letter-spacing:1px; font-family:monospace;">
                                            {{ $order['order_number'] }}
                                        </div>
                                        <div style="font-size:12px; color:#999; margin-top:4px;">
                                            Placed on {{ $order['created_at'] ?? now()->format('d M Y, H:i') }}
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    {{-- INTRODUCTORY GREETING --}}
                    <tr>
                        <td style="padding:15px 30px 0;">
                            @if(!empty($isCustomer))
                                <p style="font-size:15px; color:#333; margin:0; line-height:1.65;">
                                    Dear <strong>{{ $order['customer']['name'] }}</strong>,<br><br>
                                    Thank you for choosing <strong>{{ config('site.name', 'LuxeHair by Aisha') }}</strong>. We have successfully received your order details. To confirm your booking and initiate parcel preparation, please complete your bank transfer using the account details below.
                                </p>
                            @else
                                <p style="font-size:15px; color:#333; margin:0; line-height:1.65;">
                                    <strong>Attention:</strong> A new order has been received on your store. Please review the customer details and verify payment receipt in your Nationwide bank account before scheduling dispatch.
                                </p>
                            @endif
                        </td>
                    </tr>

                    {{-- PAYMENT SECTION --}}
                    <tr>
                        <td style="padding:20px 30px;">
                            @if(!empty($isCustomer))
                                {{-- CUSTOMER VIEW: BANK DETAILS & STEPS --}}
                                <div style="background:#fdfcf9; border:1px solid #e5d7ad; border-radius:10px; padding:20px;">
                                    <div style="font-size:12px; text-transform:uppercase; letter-spacing:1.5px; color:#997a23; font-weight:700; margin-bottom:12px; border-bottom:1px solid #ede1be; padding-bottom:8px;">
                                        Bank Transfer Payment Instructions
                                    </div>

                                    <table width="100%" cellpadding="6" cellspacing="0" style="font-size:13.5px; color:#222;">
                                        <tr>
                                            <td width="35%" style="color:#777;">Bank Name:</td>
                                            <td><strong>Nationwide</strong></td>
                                        </tr>
                                        <tr>
                                            <td style="color:#777;">Account Name:</td>
                                            <td><strong>Aisha Hassan ceesay</strong></td>
                                        </tr>
                                        <tr>
                                            <td style="color:#777;">Sort Code:</td>
                                            <td><strong style="color:#b08828; font-family:monospace; font-size:15px; letter-spacing:1px;">07-04-36</strong></td>
                                        </tr>
                                        <tr>
                                            <td style="color:#777;">Account Number:</td>
                                            <td><strong style="color:#b08828; font-family:monospace; font-size:15px; letter-spacing:1px;">09496385</strong></td>
                                        </tr>
                                        <tr>
                                            <td style="color:#777;">IBAN:</td>
                                            <td><strong style="font-family:monospace; font-size:12.5px;">GB61 NAIA 0704 3609 4963 85</strong></td>
                                        </tr>
                                        <tr>
                                            <td style="color:#777;">Amount Payable:</td>
                                            <td><strong style="color:#b08828; font-size:15px;">{{ config('site.currency_symbol', '£') }}{{ number_format($order['total'], 2) }}</strong></td>
                                        </tr>
                                        <tr>
                                            <td style="color:#777;">Reference:</td>
                                            <td><strong style="color:#333; font-family:monospace;">{{ $order['order_number'] }}</strong></td>
                                        </tr>
                                    </table>

                                    <div style="margin-top:16px; padding:12px 14px; background:#f4ede0; border-radius:6px; font-size:12.5px; color:#3a3018; line-height:1.55;">
                                        <strong>Next Step:</strong> Once the transfer is complete, kindly share your payment confirmation receipt via WhatsApp to <strong style="color:#1b6d3b;">+44 7539 593290</strong> or reply directly to this email.
                                    </div>

                                    <div style="margin-top:10px; font-size:11.5px; color:#7d6b38; line-height:1.45;">
                                        <em>* Policy Notice: Orders are confirmed and prepared for dispatch once payment is verified.</em>
                                    </div>
                                </div>
                            @else
                                {{-- ADMIN VIEW: STATUS & VERIFICATION ACTION --}}
                                <div style="background:#f9f9f9; border:1px solid #e0e0e0; border-left:4px solid #b08828; border-radius:8px; padding:18px;">
                                    <div style="font-size:11px; text-transform:uppercase; letter-spacing:1.5px; color:#666; font-weight:700;">
                                        Payment Status
                                    </div>
                                    <div style="font-size:16px; font-weight:700; color:#b08828; margin-top:4px;">
                                        Awaiting Bank Transfer Verification ({{ config('site.currency_symbol', '£') }}{{ number_format($order['total'], 2) }})
                                    </div>

                                    <div style="margin-top:12px; font-size:13px; color:#444; line-height:1.55;">
                                        <strong>Action Required:</strong>
                                        <ul style="margin:6px 0 0; padding-left:18px;">
                                            <li>Check your <strong>Nationwide</strong> account (A/C: <strong>09496385</strong>) for <strong>{{ config('site.currency_symbol', '£') }}{{ number_format($order['total'], 2) }}</strong>.</li>
                                            <li>Check WhatsApp (<strong>+44 7539 593290</strong>) for the customer's payment screenshot with reference <strong>{{ $order['order_number'] }}</strong>.</li>
                                            <li>Once payment is verified, proceed with wig preparation and dispatch.</li>
                                        </ul>
                                    </div>
                                </div>
                            @endif
                        </td>
                    </tr>

                    {{-- CUSTOMER DETAILS --}}
                    <tr>
                        <td style="padding:0 30px 20px;">
                            <h2 style="font-size:16px; margin:0 0 12px; text-transform:uppercase; letter-spacing:1px; color:#333; font-weight:700; border-bottom:1px solid #eee; padding-bottom:8px;">
                                Delivery & Contact Information
                            </h2>

                            <table width="100%" cellpadding="6" cellspacing="0" style="font-size:13.5px;">
                                <tr>
                                    <td width="30%" style="color:#777;">Customer Name</td>
                                    <td style="font-weight:600; color:#111;">{{ $order['customer']['name'] }}</td>
                                </tr>
                                <tr>
                                    <td style="color:#777;">Email Address</td>
                                    <td><a href="mailto:{{ $order['customer']['email'] }}" style="color:#b08828; text-decoration:none;">{{ $order['customer']['email'] }}</a></td>
                                </tr>
                                <tr>
                                    <td style="color:#777;">Phone Number</td>
                                    <td><a href="tel:{{ $order['customer']['phone'] }}" style="color:#111; text-decoration:none; font-weight:600;">{{ $order['customer']['phone'] }}</a></td>
                                </tr>
                                <tr>
                                    <td style="color:#777; vertical-align:top;">Shipping Address</td>
                                    <td style="color:#333; line-height:1.45;">
                                        {{ $order['customer']['address'] }}<br>
                                        {{ $order['customer']['city'] }}, {{ $order['customer']['postcode'] }}
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    {{-- ORDER ITEMS --}}
                    <tr>
                        <td style="padding:10px 30px 20px;">
                            <h2 style="font-size:16px; margin:0 0 12px; text-transform:uppercase; letter-spacing:1px; color:#333; font-weight:700; border-bottom:1px solid #eee; padding-bottom:8px;">
                                Order Items
                            </h2>

                            <table width="100%" cellpadding="0" cellspacing="0" style="border-collapse:collapse;">
                                @foreach ($order['items'] as $item)
                                    <tr>
                                        <td style="padding:14px 0; border-bottom:1px solid #eeeeee;">
                                            <strong style="font-size:14px; color:#111;">
                                                {{ $item['name'] }}
                                            </strong>
                                            <div style="font-size:12.5px; color:#777; margin-top:4px;">
                                                Length: {{ $item['variant'] }} &nbsp;|&nbsp; Quantity: {{ $item['quantity'] }}
                                            </div>
                                        </td>
                                        <td align="right" valign="middle" style="padding:14px 0; border-bottom:1px solid #eeeeee; font-weight:700; color:#b08828; font-size:14px;">
                                            {{ config('site.currency_symbol', '£') }}{{ number_format($item['price'] * $item['quantity'], 2) }}
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </td>
                    </tr>

                    {{-- TOTALS SUMMARY --}}
                    <tr>
                        <td style="padding:0 30px 30px;">
                            <table width="100%" cellpadding="6" cellspacing="0">
                                <tr>
                                    <td style="font-size:14px; color:#666;">Delivery Courier (Tracked)</td>
                                    <td align="right" style="font-size:14px; color:#1b6d3b; font-weight:600;">FREE</td>
                                </tr>
                                <tr>
                                    <td style="font-size:18px; font-weight:700; color:#111; border-top:1px solid #e0e0e0; padding-top:14px;">
                                        Total Amount
                                    </td>
                                    <td align="right" style="font-size:22px; font-weight:700; color:#b08828; border-top:1px solid #e0e0e0; padding-top:14px;">
                                        {{ config('site.currency_symbol', '£') }}{{ number_format($order['total'], 2) }}
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    {{-- BRAND FOOTER --}}
                    <tr>
                        <td style="background:#0b0b0b; padding:24px 30px; text-align:center;">
                            <div style="color:#e8c96a; font-size:11px; letter-spacing:2px; text-transform:uppercase; font-weight:600;">
                                {{ config('site.name', 'LuxeHair by Aisha') }}
                            </div>
                            <p style="color:#888; font-size:12px; margin:8px 0 0; line-height:1.5;">
                                @if(!empty($isCustomer))
                                    Thank you for your business. For customer assistance, contact us via WhatsApp at +44 7539 593290 or reply directly to this email.
                                @else
                                    Automated store notification for LuxeHair by Aisha administrators.
                                @endif
                            </p>
                        </td>
                    </tr>

                </table>

            </td>
        </tr>
    </table>

</body>
</html>
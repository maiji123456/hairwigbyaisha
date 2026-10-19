<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>New Order {{ $order['order_number'] }}</title>
</head>

<body style="margin:0; padding:0; background:#f4f4f4; font-family:Arial, Helvetica, sans-serif; color:#222;">

    <table width="100%" cellpadding="0" cellspacing="0" border="0" style="background:#f4f4f4; padding:30px 15px;">

        <tr>
            <td align="center">

                <table width="650" cellpadding="0" cellspacing="0" border="0"
                    style="max-width:650px; width:100%; background:#ffffff; border-radius:12px; overflow:hidden;">

                    {{-- Header --}}
                    <tr>
                        <td style="background:#0b0b0b; padding:30px; text-align:center;">

                            <div style="font-size:13px; letter-spacing:3px; text-transform:uppercase; color:#e8c96a;">
                                {{ !empty($isCustomer) ? 'Order Confirmation' : 'New Order' }}
                            </div>

                            <h1 style="margin:10px 0 0; color:#ffffff; font-size:28px;">
                                {{ config('site.name', 'LuxeHair by Aisha') }}
                            </h1>

                        </td>
                    </tr>


                    {{-- Order Number --}}
                    <tr>
                        <td style="padding:30px 30px 10px;">

                            <div
                                style="background:#faf8f0; border:1px solid #eadca5; border-radius:8px; padding:18px; text-align:center;">

                                <div style="font-size:12px; color:#777; text-transform:uppercase; letter-spacing:1px;">
                                    Order Number
                                </div>

                                <div style="font-size:22px; font-weight:bold; color:#a47d18; margin-top:6px;">
                                    {{ $order['order_number'] }}
                                </div>

                            </div>

                        </td>
                    </tr>

                    @if(!empty($isCustomer))
                    <tr>
                        <td style="padding:15px 30px 0;">
                            <p style="font-size:15px; color:#333; margin:0; line-height:1.6;">
                                Hello <strong>{{ $order['customer']['name'] }}</strong>,<br>
                                Thank you for shopping with <strong>{{ config('site.name', 'LuxeHair by Aisha') }}</strong>! Your order has been placed successfully. Below are your order details:
                            </p>
                        </td>
                    </tr>
                    @endif


                    {{-- Customer --}}
                    <tr>
                        <td style="padding:20px 30px;">

                            <h2 style="font-size:18px; margin:0 0 15px;">
                                Customer Details
                            </h2>

                            <table width="100%" cellpadding="5" cellspacing="0">

                                <tr>
                                    <td width="35%" style="color:#777; font-size:14px;">
                                        Name
                                    </td>

                                    <td style="font-size:14px; font-weight:bold;">
                                        {{ $order['customer']['name'] }}
                                    </td>
                                </tr>

                                <tr>
                                    <td style="color:#777; font-size:14px;">
                                        Email
                                    </td>

                                    <td style="font-size:14px;">
                                        {{ $order['customer']['email'] }}
                                    </td>
                                </tr>

                                <tr>
                                    <td style="color:#777; font-size:14px;">
                                        Phone
                                    </td>

                                    <td style="font-size:14px;">
                                        {{ $order['customer']['phone'] }}
                                    </td>
                                </tr>

                                <tr>
                                    <td style="color:#777; font-size:14px; vertical-align:top;">
                                        Address
                                    </td>

                                    <td style="font-size:14px;">
                                        {{ $order['customer']['address'] }}<br>
                                        {{ $order['customer']['city'] }},
                                        {{ $order['customer']['postcode'] }}
                                    </td>
                                </tr>

                            </table>

                        </td>
                    </tr>


                    {{-- Payment --}}
                    <tr>
                        <td style="padding:0 30px 20px;">

                            <div style="background:#faf8f0; border:1px solid #eadca5; border-radius:8px; padding:18px;">

                                <div style="font-size:12px; color:#777; text-transform:uppercase; letter-spacing:1px; margin-bottom:6px;">
                                    Payment Method
                                </div>

                                <div style="color:#a47d18; font-weight:bold; font-size:16px; margin-bottom:12px;">
                                    {{ $order['payment_method'] }}
                                </div>

                                {{-- Bank Details --}}
                                <table width="100%" cellpadding="4" cellspacing="0" style="font-size:13px; color:#333; border-top:1px dashed #d8c78c; padding-top:10px;">
                                    <tr>
                                        <td width="38%" style="color:#666;">Bank Name:</td>
                                        <td><strong>Nationwide</strong></td>
                                    </tr>
                                    <tr>
                                        <td style="color:#666;">Account Name:</td>
                                        <td><strong>Aisha Hassan ceesay</strong></td>
                                    </tr>
                                    <tr>
                                        <td style="color:#666;">Sort Code:</td>
                                        <td><strong style="color:#a47d18; font-family:monospace; font-size:14px;">07-04-36</strong></td>
                                    </tr>
                                    <tr>
                                        <td style="color:#666;">Account Number:</td>
                                        <td><strong style="color:#a47d18; font-family:monospace; font-size:14px;">09496385</strong></td>
                                    </tr>
                                    <tr>
                                        <td style="color:#666;">IBAN:</td>
                                        <td><strong style="font-family:monospace; font-size:12px;">GB61 NAIA 0704 3609 4963 85</strong></td>
                                    </tr>
                                </table>

                                <div style="margin-top:14px; padding:10px 12px; background:#ffffff; border-radius:6px; border:1px solid #e0d5aa; font-size:12px; color:#333; line-height:1.5;">
                                    📲 <strong>Payment Verification:</strong> Please transfer the order total (<strong>{{ config('site.currency_symbol', '$') }}{{ number_format($order['total'], 2) }}</strong>) and send your payment screenshot to WhatsApp: <strong style="color:#128c7e;">+44 7539 593290</strong> with your Order Number: <strong>{{ $order['order_number'] }}</strong>.
                                </div>

                                <div style="margin-top:8px; font-size:11px; color:#856404; background:#fff3cd; padding:8px 10px; border-radius:4px; line-height:1.4;">
                                    ⚠️ <strong>Important Policy:</strong> Orders are strictly confirmed and prepared for dispatch only after payment verification is confirmed.
                                </div>

                            </div>

                        </td>
                    </tr>


                    {{-- Products --}}
                    <tr>
                        <td style="padding:10px 30px 20px;">

                            <h2 style="font-size:18px; margin:0 0 15px;">
                                Order Items
                            </h2>

                            <table width="100%" cellpadding="0" cellspacing="0" style="border-collapse:collapse;">

                                @foreach ($order['items'] as $item)

                                    <tr>

                                        <td style="padding:15px 0; border-bottom:1px solid #eeeeee;">

                                            <strong style="font-size:14px;">
                                                {{ $item['name'] }}
                                            </strong>

                                            <div style="font-size:13px; color:#777; margin-top:5px;">
                                                Length:
                                                {{ $item['variant'] }}
                                                &nbsp; | &nbsp;
                                                Quantity:
                                                {{ $item['quantity'] }}
                                            </div>

                                        </td>

                                        <td align="right" valign="middle"
                                            style="padding:15px 0; border-bottom:1px solid #eeeeee; font-weight:bold; color:#a47d18;">
                                            {{ config('site.currency_symbol', '$') }}{{ number_format($item['price'] * $item['quantity'], 2) }}
                                        </td>

                                    </tr>

                                @endforeach

                            </table>

                        </td>
                    </tr>


                    {{-- Total --}}
                    <tr>
                        <td style="padding:10px 30px 30px;">

                            <table width="100%" cellpadding="8" cellspacing="0">

                                <tr>
                                    <td style="font-size:15px;">
                                        Shipping
                                    </td>

                                    <td align="right" style="font-size:15px; color:#a47d18;">
                                        Free
                                    </td>
                                </tr>

                                <tr>
                                    <td
                                        style="font-size:20px; font-weight:bold; border-top:1px solid #dddddd; padding-top:15px;">
                                        Order Total
                                    </td>

                                    <td align="right"
                                        style="font-size:22px; font-weight:bold; color:#a47d18; border-top:1px solid #dddddd; padding-top:15px;">
                                        {{ config('site.currency_symbol', '$') }}{{ number_format($order['total'], 2) }}
                                    </td>
                                </tr>

                            </table>

                        </td>
                    </tr>


                    {{-- Footer --}}
                    <tr>
                        <td style="background:#0b0b0b; padding:22px 30px; text-align:center;">

                            <div style="color:#e8c96a; font-size:12px; letter-spacing:2px; text-transform:uppercase;">
                                Bank Transfer (Advance Payment)
                            </div>

                            <p style="color:#999; font-size:12px; margin:8px 0 0;">
                                {{ !empty($isCustomer) ? 'Thank you for choosing LuxeHair by Aisha. If you have any questions, reply to this email.' : 'A new order has been placed through your website.' }}
                            </p>

                        </td>
                    </tr>

                </table>

            </td>
        </tr>

    </table>

</body>

</html>
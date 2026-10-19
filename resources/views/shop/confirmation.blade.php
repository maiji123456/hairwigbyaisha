@extends('layouts.app')

@section('title', 'Order Confirmed #' . $order['order_number'] . ' — ' . config('site.name'))

@section('content')

@php
    $currency = config('site.currency_symbol', '$');
@endphp

<style>
    .confirmation-page {
        min-height: 100vh;
        background: #090909;
        color: #F5F2F0;
        padding: 130px 0 100px;
        position: relative;
    }

    .confirmation-page::before {
        content: '';
        position: absolute;
        top: 0;
        left: 50%;
        transform: translateX(-50%);
        width: 100%;
        max-width: 1100px;
        height: 420px;
        background: radial-gradient(ellipse at top, rgba(232, 184, 199, 0.09) 0%, rgba(200, 162, 90, 0.04) 50%, transparent 75%);
        pointer-events: none;
        z-index: 0;
    }

    .confirmation-container {
        position: relative;
        z-index: 1;
        max-width: 960px;
        margin: 0 auto;
        padding: 0 24px;
    }

    /* Stepper */
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
        color: rgba(245, 242, 240, 0.5);
    }

    .step-item.completed {
        color: #E8C96A;
    }

    .step-num {
        width: 26px;
        height: 26px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 0.75rem;
        border: 1px solid #E8C96A;
        color: #E8C96A;
    }

    .step-item.completed .step-num {
        background: var(--gradient-rose, linear-gradient(135deg, #E8B8C7 0%, #C8A25A 100%));
        color: #0B0B0B;
        border: none;
        font-weight: bold;
    }

    .step-divider {
        width: 35px;
        height: 1px;
        background: rgba(232, 201, 106, 0.4);
    }

    /* Success Header */
    .confirmation-hero {
        text-align: center;
        margin-bottom: 40px;
    }

    .success-icon-badge {
        width: 86px;
        height: 86px;
        border-radius: 50%;
        margin: 0 auto 20px;
        background: rgba(232, 201, 106, 0.1);
        border: 1px solid rgba(232, 201, 106, 0.4);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2.5rem;
        color: #E8C96A;
        box-shadow: 0 0 35px rgba(232, 201, 106, 0.2);
    }

    .confirmation-title {
        font-family: var(--font-display, 'Cormorant Garamond', serif);
        font-size: clamp(2.2rem, 3.5vw, 3rem);
        font-weight: 500;
        margin-bottom: 12px;
        color: #F5F2F0;
    }

    .confirmation-subtitle {
        color: rgba(245, 242, 240, 0.7);
        font-size: 1.05rem;
        max-width: 560px;
        margin: 0 auto;
        line-height: 1.6;
    }

    /* Card */
    .confirmation-card {
        background: rgba(18, 18, 18, 0.65);
        backdrop-filter: blur(18px);
        -webkit-backdrop-filter: blur(18px);
        border: 1px solid rgba(200, 162, 90, 0.3);
        border-radius: 20px;
        padding: 40px;
        box-shadow: 0 25px 60px rgba(0, 0, 0, 0.55);
    }

    /* Order Reference Banner */
    .order-reference-box {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        justify-content: space-between;
        gap: 20px;
        background: rgba(232, 201, 106, 0.08);
        border: 1px solid rgba(232, 201, 106, 0.3);
        border-radius: 14px;
        padding: 20px 24px;
        margin-bottom: 35px;
    }

    .order-ref-label {
        font-size: 0.75rem;
        text-transform: uppercase;
        letter-spacing: 0.16em;
        color: rgba(245, 242, 240, 0.6);
        margin-bottom: 4px;
    }

    .order-ref-number {
        font-family: var(--font-display, 'Cormorant Garamond', serif);
        font-size: 1.8rem;
        font-weight: 600;
        color: #E8C96A;
        letter-spacing: 0.04em;
    }

    /* Info Grid */
    .info-section-title {
        font-family: var(--font-display, 'Cormorant Garamond', serif);
        font-size: 1.45rem;
        font-weight: 500;
        color: #F5F2F0;
        margin-bottom: 16px;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .info-section-title i {
        color: #E8C96A;
        font-size: 1.1rem;
    }

    .info-box-inner {
        background: rgba(255, 255, 255, 0.02);
        border: 1px solid rgba(255, 255, 255, 0.06);
        border-radius: 12px;
        padding: 20px;
        font-size: 0.92rem;
        line-height: 1.6;
        color: rgba(245, 242, 240, 0.8);
    }

    /* Items Receipt */
    .receipt-items-list {
        margin: 30px 0;
        border-top: 1px solid rgba(255, 255, 255, 0.08);
        border-bottom: 1px solid rgba(255, 255, 255, 0.08);
        padding: 16px 0;
    }

    .receipt-item-row {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 16px;
        padding: 14px 0;
        border-bottom: 1px solid rgba(255, 255, 255, 0.05);
    }

    .receipt-item-row:last-child {
        border-bottom: none;
    }

    .receipt-item-thumb {
        width: 60px;
        height: 70px;
        border-radius: 8px;
        overflow: hidden;
        border: 1px solid rgba(200, 162, 90, 0.3);
        background: #121212;
        flex-shrink: 0;
    }

    .receipt-item-thumb img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .receipt-item-name {
        font-family: var(--font-display, 'Cormorant Garamond', serif);
        font-size: 1.18rem;
        color: #F5F2F0;
        margin-bottom: 2px;
    }

    .receipt-item-meta {
        font-size: 0.78rem;
        color: rgba(245, 242, 240, 0.55);
    }

    .receipt-item-price {
        font-family: var(--font-display, 'Cormorant Garamond', serif);
        font-size: 1.25rem;
        font-weight: 600;
        color: #E8C96A;
        white-space: nowrap;
    }

    /* Totals */
    .receipt-total-line {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding-top: 12px;
        margin-top: 10px;
    }

    .receipt-grand-total {
        font-family: var(--font-display, 'Cormorant Garamond', serif);
        font-size: 2.1rem;
        font-weight: 600;
        color: #E8C96A;
    }

    /* Actions */
    .confirmation-actions {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 16px;
        margin-top: 40px;
    }

    @media (max-width: 680px) {
        .confirmation-page {
            padding: 100px 0 60px;
        }

        .confirmation-container {
            padding: 0 16px;
        }

        .checkout-stepper {
            display: none;
        }

        .confirmation-card {
            padding: 24px 18px;
        }

        .order-reference-box {
            flex-direction: column;
            align-items: flex-start;
        }
    }
</style>

<div class="confirmation-page">

    <div class="confirmation-container">

        {{-- STEPPER --}}
        <div class="checkout-stepper">
            <div class="step-item completed">
                <span class="step-num"><i class="bi bi-check2"></i></span>
                <span>Shopping Bag</span>
            </div>
            <span class="step-divider"></span>
            <div class="step-item completed">
                <span class="step-num"><i class="bi bi-check2"></i></span>
                <span>Checkout</span>
            </div>
            <span class="step-divider"></span>
            <div class="step-item completed">
                <span class="step-num"><i class="bi bi-check2"></i></span>
                <span>Confirmation</span>
            </div>
        </div>

        {{-- HERO --}}
        <div class="confirmation-hero">
            <div class="success-icon-badge">
                <i class="bi bi-check2-circle"></i>
            </div>

            <div class="eyebrow mb-2">Order Confirmed</div>
            <h1 class="confirmation-title">
                Thank You for Choosing LuxeHair
            </h1>
            <p class="confirmation-subtitle">
                Your luxury order has been received and is being prepared for express delivery. A confirmation summary is documented below.
            </p>
        </div>

        {{-- CARD --}}
        <div class="confirmation-card">

            {{-- ORDER REFERENCE --}}
            <div class="order-reference-box">
                <div>
                    <div class="order-ref-label">Official Order Reference</div>
                    <div class="order-ref-number">{{ $order['order_number'] }}</div>
                </div>

                <div class="text-md-end">
                    <div class="order-ref-label">Order Date & Time</div>
                    <div style="color:#F5F2F0; font-size:0.95rem;">{{ $order['created_at'] }}</div>
                </div>
            </div>

            {{-- DETAILS GRID --}}
            <div class="row g-4">
                {{-- Delivery Details --}}
                <div class="col-md-6">
                    <h3 class="info-section-title">
                        <i class="bi bi-truck"></i> Delivery Details
                    </h3>
                    <div class="info-box-inner">
                        <strong style="color:#F5F2F0; font-size:1rem; display:block; margin-bottom:4px;">
                            {{ $order['customer']['name'] }}
                        </strong>
                        <div><i class="bi bi-envelope me-2" style="color:#E8C96A;"></i>{{ $order['customer']['email'] }}</div>
                        <div><i class="bi bi-telephone me-2" style="color:#E8C96A;"></i>{{ $order['customer']['phone'] }}</div>
                        <div class="mt-2 pt-2 border-top" style="border-color:rgba(255,255,255,0.08)!important;">
                            <i class="bi bi-geo-alt me-2" style="color:#E8C96A;"></i>
                            {{ $order['customer']['address'] }}, {{ $order['customer']['city'] }} {{ $order['customer']['postcode'] }}
                        </div>
                    </div>
                </div>

                {{-- Payment Method --}}
                <div class="col-md-6">
                    <h3 class="info-section-title">
                        <i class="bi bi-bank2"></i> Payment Information
                    </h3>
                    <div class="info-box-inner">
                        <div class="d-flex align-items-center gap-3">
                            <div class="d-grid place-items-center rounded-circle flex-shrink-0" style="width:42px; height:42px; background:rgba(232,201,106,0.12); color:#E8C96A; font-size:1.25rem;">
                                <i class="bi bi-bank2"></i>
                            </div>
                            <div>
                                <strong style="color:#F5F2F0; display:block;">{{ $order['payment_method'] ?? 'Bank Transfer (Advance Payment)' }}</strong>
                                <span style="font-size:0.8rem; color:#E8C96A; font-weight:600;">Advance Payment Required</span>
                            </div>
                        </div>

                        {{-- Bank Card --}}
                        <div class="mt-3 p-3 rounded-2" style="background:rgba(0,0,0,0.3); border:1px solid rgba(232,201,106,0.2); font-size:0.82rem;">
                            <div class="d-flex justify-content-between mb-1">
                                <span style="color:rgba(245,242,240,0.55);">Bank:</span>
                                <strong style="color:#FFF;">Nationwide</strong>
                            </div>
                            <div class="d-flex justify-content-between mb-1">
                                <span style="color:rgba(245,242,240,0.55);">Account Name:</span>
                                <strong style="color:#FFF;">Aisha Hassan ceesay</strong>
                            </div>
                            <div class="d-flex justify-content-between mb-1">
                                <span style="color:rgba(245,242,240,0.55);">Sort Code:</span>
                                <strong style="color:#E8C96A; font-family:monospace; letter-spacing:1px;">07-04-36</strong>
                            </div>
                            <div class="d-flex justify-content-between mb-1">
                                <span style="color:rgba(245,242,240,0.55);">Account No:</span>
                                <strong style="color:#E8C96A; font-family:monospace; letter-spacing:1px;">09496385</strong>
                            </div>
                            <div class="d-flex justify-content-between">
                                <span style="color:rgba(245,242,240,0.55);">IBAN:</span>
                                <strong style="color:#FFF; font-family:monospace; font-size:0.78rem;">GB61 NAIA 0704 3609 4963 85</strong>
                            </div>
                        </div>

                        {{-- WhatsApp Button --}}
                        @php
                            $waMessage = urlencode("Hello, I have made the advance payment for Order " . ($order['order_number'] ?? '') . " (" . config('site.name', 'LuxeHair by Aisha') . "). Here is my payment screenshot.");
                        @endphp
                        <a href="https://wa.me/447539593290?text={{ $waMessage }}" target="_blank" rel="noopener" class="btn btn-sm w-100 mt-3 d-flex align-items-center justify-content-center gap-2" style="background:#25D366; color:#FFFFFF; font-weight:600; border-radius:8px; padding:10px 14px; text-decoration:none;">
                            <i class="bi bi-whatsapp fs-6"></i>
                            <span>Send Screenshot on WhatsApp</span>
                        </a>

                        <div class="mt-2 pt-2 border-top" style="border-color:rgba(255,255,255,0.08)!important; font-size:0.75rem; color:rgba(245,242,240,0.65); line-height:1.4;">
                            <strong style="color:#E8C96A;"><i class="bi bi-info-circle me-1"></i> Order Policy:</strong>
                            Orders will strictly be confirmed upon verified receipt of payment. Your parcel will be processed for dispatch as soon as your WhatsApp payment screenshot is confirmed.
                        </div>
                    </div>
                </div>
            </div>

            {{-- ITEMS LIST --}}
            <div class="receipt-items-list">
                @foreach ($order['items'] as $item)
                    @php
                        $thumb = !empty($item['image']) ? asset($item['image']) : asset('assets/images/hnahair-1.jpg');
                    @endphp
                    <div class="receipt-item-row">
                        <div class="d-flex align-items-center gap-3">
                            <div class="receipt-item-thumb">
                                <img src="{{ $thumb }}" alt="{{ $item['name'] }}">
                            </div>
                            <div>
                                <div class="receipt-item-name">{{ $item['name'] }}</div>
                                <div class="receipt-item-meta">
                                    Option: {{ $item['variant'] }} • Qty: {{ $item['quantity'] }}
                                </div>
                            </div>
                        </div>
                        <div class="receipt-item-price">
                            {{ $currency }}{{ number_format($item['price'] * $item['quantity'], 2) }}
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- TOTALS SUMMARY --}}
            <div class="d-flex flex-column gap-2">
                <div class="d-flex justify-content-between" style="font-size:0.92rem; color:rgba(245,242,240,0.7);">
                    <span>Delivery Courier (Tracked)</span>
                    <span style="color:#8FD8A0; font-weight:600;">FREE</span>
                </div>
                <div class="receipt-total-line">
                    <div>
                        <strong style="color:#F5F2F0; font-size:1.15rem; display:block;">Grand Total</strong>
                        <span style="font-size:0.75rem; color:rgba(245,242,240,0.5);">All taxes and duties included</span>
                    </div>
                    <div class="receipt-grand-total">
                        {{ $currency }}{{ number_format($order['total'], 2) }}
                    </div>
                </div>
            </div>

            {{-- ACTIONS --}}
            <div class="confirmation-actions">
                <a href="{{ route('home') }}" class="btn-luxe text-decoration-none" style="padding:0.9rem 2.2rem;">
                    <i class="bi bi-house-door me-1"></i> Return to Home
                </a>
                <a href="{{ route('home') }}#wax" class="btn-luxe text-decoration-none" style="background:transparent; border:1px solid rgba(200,162,90,0.5); color:#E8C96A; padding:0.9rem 2.2rem;">
                    <i class="bi bi-gem me-1"></i> Continue Shopping
                </a>
            </div>

        </div>

    </div>

</div>

@endsection
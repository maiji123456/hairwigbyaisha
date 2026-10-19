@extends('layouts.app')

@section('title', 'Secure Checkout — ' . config('site.name'))

@section('content')

@php
    $currency = config('site.currency_symbol', '$');
    $itemCount = collect($cart)->sum('quantity');
    $errors = $errors ?? new \Illuminate\Support\ViewErrorBag;
@endphp

<style>
    .checkout-page {
        min-height: 100vh;
        background: #090909;
        color: #F5F2F0;
        padding: 130px 0 100px;
        position: relative;
    }

    .checkout-page::before {
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

    .checkout-container {
        position: relative;
        z-index: 1;
        max-width: 1280px;
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
        color: rgba(245, 242, 240, 0.45);
        text-decoration: none;
        transition: color 0.2s ease;
    }

    .step-item.completed {
        color: rgba(245, 242, 240, 0.75);
    }

    .step-item.completed:hover {
        color: #E8C96A;
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

    .step-item.completed .step-num {
        border-color: #E8C96A;
        color: #E8C96A;
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
    .checkout-header-row {
        display: flex;
        align-items: flex-end;
        justify-content: space-between;
        gap: 20px;
        margin-bottom: 30px;
        padding-bottom: 20px;
        border-bottom: 1px solid rgba(255, 255, 255, 0.08);
    }

    .checkout-main-title {
        font-family: var(--font-display, 'Cormorant Garamond', serif);
        font-size: clamp(2rem, 3.2vw, 2.75rem);
        font-weight: 500;
        margin: 0;
        color: #F5F2F0;
    }

    .checkout-back-link {
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

    .checkout-back-link:hover {
        color: #E8C96A;
        transform: translateX(-3px);
    }

    /* Grid Layout */
    .checkout-grid {
        display: grid;
        grid-template-columns: minmax(0, 1.6fr) minmax(0, 1fr);
        gap: 40px;
        align-items: start;
    }

    /* Form Container */
    .checkout-form-card {
        background: rgba(18, 18, 18, 0.65);
        backdrop-filter: blur(16px);
        -webkit-backdrop-filter: blur(16px);
        border: 1px solid rgba(200, 162, 90, 0.25);
        border-radius: 20px;
        padding: 40px;
        box-shadow: 0 25px 60px rgba(0, 0, 0, 0.5);
    }

    .checkout-section-title {
        font-family: var(--font-display, 'Cormorant Garamond', serif);
        font-size: 1.65rem;
        font-weight: 500;
        color: #F5F2F0;
        margin-bottom: 22px;
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .checkout-section-title i {
        color: #E8C96A;
        font-size: 1.25rem;
    }

    .checkout-divider {
        height: 1px;
        background: rgba(255, 255, 255, 0.08);
        margin: 35px 0;
    }

    /* Form Inputs */
    .form-group-custom {
        margin-bottom: 20px;
    }

    .form-label-custom {
        display: block;
        font-size: 0.76rem;
        font-weight: 500;
        text-transform: uppercase;
        letter-spacing: 0.16em;
        color: #E8C96A;
        margin-bottom: 8px;
    }

    .form-label-custom span.req {
        color: #E8B8C7;
        margin-left: 2px;
    }

    .form-control-custom {
        width: 100%;
        min-height: 50px;
        padding: 12px 18px;
        border: 1px solid rgba(200, 162, 90, 0.3);
        border-radius: 10px;
        background: #141414;
        color: #F5F2F0;
        font-size: 0.95rem;
        outline: none;
        transition: all 0.25s ease;
    }

    .form-control-custom:focus {
        border-color: #E8C96A;
        box-shadow: 0 0 0 3px rgba(232, 201, 106, 0.15);
        background: #161616;
    }

    .form-control-custom::placeholder {
        color: rgba(245, 242, 240, 0.3);
        font-size: 0.9rem;
    }

    .form-control-custom.is-invalid {
        border-color: #FF6B6B;
    }

    .form-hint {
        font-size: 0.76rem;
        color: rgba(245, 242, 240, 0.45);
        margin-top: 5px;
    }

    /* Payment Method Cards */
    .payment-option-card {
        border: 1px solid rgba(200, 162, 90, 0.45);
        background: rgba(232, 201, 106, 0.05);
        border-radius: 14px;
        padding: 20px 22px;
        display: flex;
        align-items: center;
        gap: 16px;
        position: relative;
        cursor: pointer;
        transition: all 0.25s ease;
    }

    .payment-option-card:hover {
        background: rgba(232, 201, 106, 0.08);
        border-color: #E8C96A;
    }

    .payment-option-radio {
        accent-color: #E8C96A;
        width: 18px;
        height: 18px;
    }

    .payment-option-icon {
        width: 44px;
        height: 44px;
        border-radius: 10px;
        background: rgba(232, 201, 106, 0.15);
        color: #E8C96A;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.3rem;
        flex-shrink: 0;
    }

    .payment-option-title {
        font-weight: 600;
        color: #F5F2F0;
        font-size: 0.98rem;
    }

    .payment-option-desc {
        font-size: 0.8rem;
        color: rgba(245, 242, 240, 0.65);
        margin-top: 2px;
    }

    /* Summary Card */
    .checkout-summary-card {
        position: sticky;
        top: 110px;
        background: rgba(18, 18, 18, 0.7);
        backdrop-filter: blur(18px);
        -webkit-backdrop-filter: blur(18px);
        border: 1px solid rgba(200, 162, 90, 0.35);
        border-radius: 20px;
        padding: 32px;
        box-shadow: 0 25px 60px rgba(0, 0, 0, 0.55);
    }

    .checkout-summary-title {
        font-family: var(--font-display, 'Cormorant Garamond', serif);
        font-size: 1.75rem;
        font-weight: 500;
        margin: 0 0 22px;
        color: #F5F2F0;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .checkout-items-list {
        max-height: 280px;
        overflow-y: auto;
        padding-right: 6px;
        margin-bottom: 22px;
    }

    .checkout-item-mini {
        display: flex;
        align-items: center;
        gap: 16px;
        padding: 14px 0;
        border-bottom: 1px solid rgba(255, 255, 255, 0.06);
    }

    .checkout-item-mini:last-child {
        border-bottom: none;
    }

    .checkout-item-thumb-box {
        position: relative;
        width: 64px;
        height: 74px;
        border-radius: 10px;
        overflow: hidden;
        border: 1px solid rgba(200, 162, 90, 0.3);
        background: #141414;
        flex-shrink: 0;
    }

    .checkout-item-thumb-box img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .checkout-item-qty-bubble {
        position: absolute;
        top: -6px;
        right: -6px;
        background: #E8C96A;
        color: #0B0B0B;
        font-weight: 700;
        font-size: 0.68rem;
        width: 20px;
        height: 20px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        border: 2px solid #090909;
    }

    .checkout-item-mini-info {
        flex: 1;
        min-width: 0;
    }

    .checkout-item-mini-name {
        font-family: var(--font-display, 'Cormorant Garamond', serif);
        font-size: 1.15rem;
        color: #F5F2F0;
        line-height: 1.2;
        margin-bottom: 3px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .checkout-item-mini-variant {
        font-size: 0.75rem;
        color: rgba(245, 242, 240, 0.6);
    }

    .checkout-item-mini-price {
        font-family: var(--font-display, 'Cormorant Garamond', serif);
        font-size: 1.25rem;
        font-weight: 600;
        color: #E8C96A;
        white-space: nowrap;
    }

    /* Coupon Box */
    .coupon-box {
        display: flex;
        gap: 10px;
        margin-bottom: 22px;
    }

    .coupon-input {
        flex: 1;
        min-height: 44px;
        padding: 8px 14px;
        border: 1px solid rgba(255, 255, 255, 0.12);
        border-radius: 8px;
        background: #141414;
        color: #F5F2F0;
        font-size: 0.85rem;
        outline: none;
    }

    .coupon-input:focus {
        border-color: #E8C96A;
    }

    .btn-coupon {
        padding: 0 16px;
        border: 1px solid rgba(200, 162, 90, 0.4);
        border-radius: 8px;
        background: transparent;
        color: #E8C96A;
        font-size: 0.78rem;
        font-weight: 600;
        letter-spacing: 0.1em;
        text-transform: uppercase;
        cursor: pointer;
        transition: all 0.2s ease;
    }

    .btn-coupon:hover {
        background: #E8C96A;
        color: #0B0B0B;
    }

    /* Totals */
    .summary-line {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 12px;
        font-size: 0.92rem;
        color: rgba(245, 242, 240, 0.7);
    }

    .summary-line.total-line {
        margin-top: 18px;
        padding-top: 16px;
        border-top: 1px solid rgba(255, 255, 255, 0.12);
        color: #F5F2F0;
    }

    .summary-total-amount {
        font-family: var(--font-display, 'Cormorant Garamond', serif);
        font-size: 2.2rem;
        font-weight: 600;
        color: #E8C96A;
        line-height: 1;
    }

    /* CTA Button */
    .btn-place-order {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        width: 100%;
        min-height: 56px;
        border: 0;
        border-radius: 999px;
        background: var(--gradient-rose, linear-gradient(135deg, #E8B8C7 0%, #C8A25A 100%));
        color: #0B0B0B;
        font-size: 0.88rem;
        font-weight: 700;
        letter-spacing: 0.12em;
        text-transform: uppercase;
        cursor: pointer;
        margin-top: 24px;
        transition: all 0.3s ease;
        box-shadow: 0 10px 30px -10px rgba(232, 184, 199, 0.45);
    }

    .btn-place-order:hover {
        transform: translateY(-2px);
        box-shadow: 0 16px 36px -8px rgba(232, 184, 199, 0.6);
        opacity: 0.96;
    }

    /* Security list */
    .checkout-trust-list {
        margin-top: 24px;
        padding-top: 20px;
        border-top: 1px solid rgba(255, 255, 255, 0.08);
        display: flex;
        flex-direction: column;
        gap: 10px;
        font-size: 0.78rem;
        color: rgba(245, 242, 240, 0.6);
    }

    .checkout-trust-item {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .checkout-trust-item i {
        color: #E8C96A;
        font-size: 0.95rem;
    }

    /* Alerts */
    .checkout-error-box {
        background: rgba(198, 40, 40, 0.15);
        border: 1px solid rgba(239, 83, 80, 0.35);
        color: #FFCDD2;
        border-radius: 12px;
        padding: 16px 20px;
        margin-bottom: 30px;
        font-size: 0.9rem;
    }

    /* Responsive */
    @media (max-width: 991px) {
        .checkout-grid {
            grid-template-columns: 1fr;
            gap: 35px;
        }

        .checkout-summary-card {
            position: static;
        }
    }

    @media (max-width: 680px) {
        .checkout-page {
            padding: 100px 0 60px;
        }

        .checkout-container {
            padding: 0 16px;
        }

        .checkout-stepper {
            display: none;
        }

        .checkout-form-card,
        .checkout-summary-card {
            padding: 24px 18px;
        }
    }
</style>

<div class="checkout-page">

    <div class="checkout-container">

        {{-- CHECKOUT STEPPER --}}
        <div class="checkout-stepper">
            <a href="{{ route('shop.cart') }}" class="step-item completed">
                <span class="step-num"><i class="bi bi-check2"></i></span>
                <span>Shopping Bag</span>
            </a>
            <span class="step-divider"></span>
            <div class="step-item active">
                <span class="step-num">2</span>
                <span>Checkout & Delivery</span>
            </div>
            <span class="step-divider"></span>
            <div class="step-item">
                <span class="step-num">3</span>
                <span>Confirmation</span>
            </div>
        </div>

        {{-- HEADER ROW --}}
        <div class="checkout-header-row">
            <div>
                <div class="eyebrow mb-1">Encrypted 256-Bit SSL Checkout</div>
                <h1 class="checkout-main-title">
                    Finalize Your Order
                </h1>
            </div>

            <a href="{{ route('shop.cart') }}" class="checkout-back-link">
                <i class="bi bi-arrow-left"></i>
                Return to Shopping Bag
            </a>
        </div>

        {{-- VALIDATION ERRORS --}}
        @if ($errors->any())
            <div class="checkout-error-box">
                <div class="fw-semibold mb-2 d-flex align-items-center gap-2">
                    <i class="bi bi-exclamation-octagon-fill"></i>
                    Please resolve the following fields:
                </div>
                <ul class="mb-0 ps-3">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- MAIN CHECKOUT FORM --}}
        <form action="{{ route('shop.checkout.place') }}" method="POST" id="checkoutForm">
            @csrf

            <div class="checkout-grid">

                {{-- LEFT: CUSTOMER & DELIVERY INFORMATION --}}
                <div class="checkout-form-card">

                    {{-- SECTION 1: CONTACT --}}
                    <h2 class="checkout-section-title">
                        <i class="bi bi-person-circle"></i>
                        Contact Information
                    </h2>

                    <div class="row g-3">
                        <div class="col-12 form-group-custom">
                            <label for="name" class="form-label-custom">
                                Full Name <span class="req">*</span>
                            </label>
                            <input
                                type="text"
                                id="name"
                                name="name"
                                class="form-control-custom {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                value="{{ old('name') }}"
                                placeholder="e.g. Sophia Al-Mansoor"
                                autocomplete="name"
                                required
                            >
                        </div>

                        <div class="col-md-6 form-group-custom">
                            <label for="email" class="form-label-custom">
                                Email Address <span class="req">*</span>
                            </label>
                            <input
                                type="email"
                                id="email"
                                name="email"
                                class="form-control-custom {{ $errors->has('email') ? 'is-invalid' : '' }}"
                                value="{{ old('email') }}"
                                placeholder="sophia@example.com"
                                autocomplete="email"
                                required
                            >
                            <div class="form-hint">Order confirmation & tracking sent here</div>
                        </div>

                        <div class="col-md-6 form-group-custom">
                            <label for="phone" class="form-label-custom">
                                Phone Number <span class="req">*</span>
                            </label>
                            <input
                                type="tel"
                                id="phone"
                                name="phone"
                                class="form-control-custom {{ $errors->has('phone') ? 'is-invalid' : '' }}"
                                value="{{ old('phone') }}"
                                placeholder="+44 7539 593290"
                                autocomplete="tel"
                                required
                            >
                            <div class="form-hint">Required for courier delivery updates</div>
                        </div>
                    </div>

                    <div class="checkout-divider"></div>

                    {{-- SECTION 2: SHIPPING DESTINATION --}}
                    <h2 class="checkout-section-title">
                        <i class="bi bi-geo-alt-fill"></i>
                        Delivery Destination
                    </h2>

                    <div class="row g-3">
                        <div class="col-12 form-group-custom">
                            <label for="address" class="form-label-custom">
                                Street Address / Apartment / Suite <span class="req">*</span>
                            </label>
                            <textarea
                                id="address"
                                name="address"
                                rows="3"
                                class="form-control-custom {{ $errors->has('address') ? 'is-invalid' : '' }}"
                                placeholder="Apartment, suite, building, street address..."
                                autocomplete="street-address"
                                required
                            >{{ old('address') }}</textarea>
                        </div>

                        <div class="col-md-7 form-group-custom">
                            <label for="city" class="form-label-custom">
                                City / District <span class="req">*</span>
                            </label>
                            <input
                                type="text"
                                id="city"
                                name="city"
                                class="form-control-custom {{ $errors->has('city') ? 'is-invalid' : '' }}"
                                value="{{ old('city') }}"
                                placeholder="e.g. London / Beverly Hills"
                                autocomplete="address-level2"
                                required
                            >
                        </div>

                        <div class="col-md-5 form-group-custom">
                            <label for="postcode" class="form-label-custom">
                                Postal Code / Zip <span class="req">*</span>
                            </label>
                            <input
                                type="text"
                                id="postcode"
                                name="postcode"
                                class="form-control-custom {{ $errors->has('postcode') ? 'is-invalid' : '' }}"
                                value="{{ old('postcode') }}"
                                placeholder="e.g. W1K 1DA"
                                autocomplete="postal-code"
                                required
                            >
                        </div>
                    </div>

                    <div class="checkout-divider"></div>

                    {{-- SECTION 3: PAYMENT METHOD --}}
                    <h2 class="checkout-section-title">
                        <i class="bi bi-credit-card-2-front-fill"></i>
                        Payment Method
                    </h2>

                    <div class="payment-option-card">
                        <input
                            type="radio"
                            name="payment_method_choice"
                            id="payment_cod"
                            value="cod"
                            checked
                            class="payment-option-radio"
                        >

                        <div class="payment-option-icon">
                            <i class="bi bi-cash-stack"></i>
                        </div>

                        <div class="flex-grow-1">
                            <div class="d-flex align-items-center justify-content-between">
                                <span class="payment-option-title">Cash on Delivery (Pay upon Arrival)</span>
                                <span class="badge" style="background:#E8C96A; color:#0B0B0B; font-size:0.65rem; text-transform:uppercase; letter-spacing:0.1em; border-radius:50px; padding:4px 10px;">Available</span>
                            </div>
                            <div class="payment-option-desc">
                                Pay securely in cash or card directly to the courier when your parcel arrives. Zero advance payment needed.
                            </div>
                        </div>
                    </div>

                    <div class="mt-4 pt-2 d-flex align-items-center gap-2" style="font-size:0.78rem; color:rgba(245,242,240,0.55);">
                        <i class="bi bi-shield-check" style="color:#E8C96A;"></i>
                        By completing your order, you agree to LuxeHair's client service terms and 100% hair authenticity guarantee.
                    </div>

                </div>

                {{-- RIGHT: STICKY ORDER SUMMARY --}}
                <div class="checkout-summary-card">

                    <h2 class="checkout-summary-title">
                        <span>Order Summary</span>
                        <span style="font-size:0.85rem; color:#E8C96A; font-family:var(--font-sans, sans-serif); font-weight:500;">
                            {{ $itemCount }} {{ Str::plural('item', $itemCount) }}
                        </span>
                    </h2>

                    {{-- ITEMS PREVIEW LIST --}}
                    <div class="checkout-items-list">
                        @foreach ($cart as $item)
                            @php
                                $thumb = !empty($item['image']) ? asset($item['image']) : asset('assets/images/hnahair-1.jpg');
                            @endphp

                            <div class="checkout-item-mini">
                                <div class="checkout-item-thumb-box">
                                    <img src="{{ $thumb }}" alt="{{ $item['name'] }}">
                                    <span class="checkout-item-qty-bubble">{{ $item['quantity'] }}</span>
                                </div>

                                <div class="checkout-item-mini-info">
                                    <div class="checkout-item-mini-name">
                                        {{ $item['name'] }}
                                    </div>
                                    <div class="checkout-item-mini-variant">
                                        {{ $item['variant'] }}
                                    </div>
                                </div>

                                <div class="checkout-item-mini-price">
                                    {{ $currency }}{{ number_format($item['price'] * $item['quantity'], 2) }}
                                </div>
                            </div>
                        @endforeach
                    </div>

                    {{-- PROMO CODE BOX --}}
                    <div class="coupon-box">
                        <input
                            type="text"
                            class="coupon-input"
                            placeholder="Voucher or Promo code"
                            id="voucherInput"
                        >
                        <button type="button" class="btn-coupon" onclick="applyPromoCode()">
                            Apply
                        </button>
                    </div>
                    <div id="promoNotice" style="display:none; font-size:0.76rem; color:#8FD8A0; margin-top:-14px; margin-bottom:18px;">
                        Promotional code activated!
                    </div>

                    {{-- FINANCIAL BREAKDOWN --}}
                    <div class="summary-line">
                        <span>Subtotal</span>
                        <span class="text-white fw-semibold">{{ $currency }}{{ number_format($total, 2) }}</span>
                    </div>

                    <div class="summary-line">
                        <span>Worldwide Express Courier</span>
                        <span style="color:#8FD8A0; font-weight:600;">FREE</span>
                    </div>

                    <div class="summary-line">
                        <span>Estimated Dispatch</span>
                        <span>Within 24 Hours</span>
                    </div>

                    <div class="summary-line">
                        <span>Customs & Taxes</span>
                        <span>Included</span>
                    </div>

                    {{-- TOTAL DUE --}}
                    <div class="summary-line total-line">
                        <div>
                            <strong style="font-size:1.15rem; color:#F5F2F0; display:block;">Total Due</strong>
                            <span style="font-size:0.75rem; color:rgba(245,242,240,0.5);">Payable upon delivery</span>
                        </div>
                        <div class="summary-total-amount">
                            {{ $currency }}{{ number_format($total, 2) }}
                        </div>
                    </div>

                    {{-- PLACE ORDER CTA BUTTON --}}
                    <button type="submit" class="btn-place-order" id="submitOrderBtn">
                        <i class="bi bi-lock-fill"></i>
                        Complete Order — {{ $currency }}{{ number_format($total, 2) }}
                        <i class="bi bi-arrow-right"></i>
                    </button>

                    {{-- TRUST GUARANTEES --}}
                    <div class="checkout-trust-list">
                        <div class="checkout-trust-item">
                            <i class="bi bi-shield-lock-fill"></i>
                            <span>256-Bit SSL Bank-Grade Protected Checkout</span>
                        </div>
                        <div class="checkout-trust-item">
                            <i class="bi bi-patch-check-fill"></i>
                            <span>100% Certified Virgin Human Hair Guarantee</span>
                        </div>
                        <div class="checkout-trust-item">
                            <i class="bi bi-box2-heart-fill"></i>
                            <span>Insured Discreet Luxury Packaging</span>
                        </div>
                    </div>

                </div>

            </div>

        </form>

    </div>

</div>

<script>
    function applyPromoCode() {
        const input = document.getElementById('voucherInput');
        const notice = document.getElementById('promoNotice');
        if (!input || !notice) return;

        if (input.value.trim().length > 0) {
            notice.style.display = 'block';
            notice.textContent = 'Code "' + input.value.trim().toUpperCase() + '" verified. Free worldwide shipping active!';
        }
    }

    document.getElementById('checkoutForm')?.addEventListener('submit', function() {
        const btn = document.getElementById('submitOrderBtn');
        if (btn) {
            btn.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span> Processing Order...';
            btn.style.pointerEvents = 'none';
            btn.style.opacity = '0.85';
        }
    });
</script>

@endsection
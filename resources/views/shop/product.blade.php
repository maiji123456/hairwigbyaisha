@extends('layouts.app')

@section('title', $product['name'] . ' — ' . config('site.name'))

@section('content')

@php
    $currency = config('site.currency_symbol', '$');
    $gallery = $product['gallery'] ?? [];

    if (empty($gallery)) {
        $gallery = [$product['image']];
    }

    $firstOption = $product['options'][0] ?? null;
    $firstValue = $firstOption['values'][0] ?? null;
    $startingPrice = $firstValue['price'] ?? 0;
    $bulkDiscounts = $product['bulk_discounts'] ?? [];
@endphp

<style>
    /* Dark Luxury Theme for Product Detail Page */
    .product-detail-page {
        min-height: 100vh;
        background: #090909;
        color: #F5F2F0;
        padding: 130px 0 100px;
        position: relative;
    }

    .product-detail-page::before {
        content: '';
        position: absolute;
        top: 0;
        left: 50%;
        transform: translateX(-50%);
        width: 100%;
        max-width: 1100px;
        height: 450px;
        background: radial-gradient(ellipse at top, rgba(232, 184, 199, 0.08) 0%, rgba(200, 162, 90, 0.04) 50%, transparent 75%);
        pointer-events: none;
        z-index: 0;
    }

    .product-detail-wrap {
        position: relative;
        z-index: 1;
        max-width: 1240px;
        margin: 0 auto;
        padding: 0 24px;
    }

    /* Breadcrumbs / Back button */
    .product-back-nav {
        margin-bottom: 35px;
    }

    .product-back-link {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        color: rgba(245, 242, 240, 0.6);
        text-decoration: none;
        font-size: 0.82rem;
        letter-spacing: 0.15em;
        text-transform: uppercase;
        transition: all 0.25s ease;
    }

    .product-back-link:hover {
        color: #E8C96A;
        transform: translateX(-3px);
    }

    .product-detail-grid {
        display: grid;
        grid-template-columns: minmax(0, 1.05fr) minmax(0, 0.95fr);
        gap: 60px;
        align-items: start;
    }

    /* Gallery */
    .product-gallery {
        position: sticky;
        top: 110px;
    }

    .product-main-image {
        position: relative;
        width: 100%;
        aspect-ratio: 1 / 1;
        background: #121212;
        border-radius: 18px;
        overflow: hidden;
        border: 1px solid rgba(200, 162, 90, 0.35);
        box-shadow: 0 25px 60px -15px rgba(0, 0, 0, 0.75);
        touch-action: pan-y pinch-zoom;
        user-select: none;
    }

    .product-main-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
        transition: opacity 0.25s ease, transform 0.4s ease;
    }

    .product-main-image:hover img {
        transform: scale(1.02);
    }

    /* Gallery Floating Navigation Arrows */
    .gallery-arrow-btn {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        width: 46px;
        height: 46px;
        border-radius: 50%;
        background: rgba(11, 11, 11, 0.78);
        backdrop-filter: blur(12px);
        -webkit-backdrop-filter: blur(12px);
        border: 1px solid rgba(200, 162, 90, 0.4);
        color: #E8C96A;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.25rem;
        cursor: pointer;
        z-index: 10;
        transition: all 0.25s ease;
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.65);
    }

    .gallery-arrow-btn:hover {
        background: var(--gradient-rose, linear-gradient(135deg, #E8B8C7 0%, #C8A25A 100%));
        color: #0B0B0B;
        border-color: #E8C96A;
        transform: translateY(-50%) scale(1.08);
        box-shadow: 0 0 25px rgba(232, 201, 106, 0.5);
    }

    .gallery-arrow-prev {
        left: 14px;
    }

    .gallery-arrow-next {
        right: 14px;
    }

    .gallery-counter-badge {
        position: absolute;
        bottom: 14px;
        right: 14px;
        padding: 6px 14px;
        border-radius: 50px;
        background: rgba(11, 11, 11, 0.75);
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
        border: 1px solid rgba(200, 162, 90, 0.35);
        color: #F5F2F0;
        font-size: 0.76rem;
        letter-spacing: 0.12em;
        font-weight: 500;
        z-index: 5;
    }

    .gallery-counter-badge span {
        color: #E8C96A;
        font-weight: 600;
    }

    /* Thumbnail Track Controls */
    .product-thumbnails-wrapper {
        position: relative;
        display: flex;
        align-items: center;
        margin-top: 16px;
        gap: 8px;
    }

    .thumb-scroll-btn {
        width: 32px;
        height: 82px;
        flex: 0 0 32px;
        border-radius: 10px;
        background: rgba(18, 18, 18, 0.9);
        border: 1px solid rgba(200, 162, 90, 0.3);
        color: #E8C96A;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.1rem;
        cursor: pointer;
        transition: all 0.2s ease;
        z-index: 2;
    }

    .thumb-scroll-btn:hover {
        background: rgba(232, 201, 106, 0.2);
        border-color: #E8C96A;
        color: #FFF;
    }

    .product-thumbnails {
        display: flex;
        gap: 12px;
        overflow-x: auto;
        scroll-behavior: smooth;
        padding: 4px 2px 10px;
        flex: 1;
        scrollbar-width: thin;
        scrollbar-color: rgba(200, 162, 90, 0.45) rgba(255, 255, 255, 0.05);
    }

    .product-thumbnails::-webkit-scrollbar {
        height: 5px;
    }

    .product-thumbnails::-webkit-scrollbar-track {
        background: rgba(255, 255, 255, 0.04);
        border-radius: 10px;
    }

    .product-thumbnails::-webkit-scrollbar-thumb {
        background: rgba(200, 162, 90, 0.45);
        border-radius: 10px;
    }

    .product-thumbnails::-webkit-scrollbar-thumb:hover {
        background: #E8C96A;
    }

    .product-thumbnail {
        width: 82px;
        height: 82px;
        flex: 0 0 82px;
        border: 1px solid rgba(255, 255, 255, 0.12);
        border-radius: 12px;
        overflow: hidden;
        padding: 0;
        background: #141414;
        cursor: pointer;
        transition: all 0.25s ease;
        scroll-snap-align: center;
    }

    .product-thumbnail:hover {
        border-color: rgba(232, 201, 106, 0.6);
        transform: translateY(-2px);
    }

    .product-thumbnail.active {
        border-color: #E8C96A;
        box-shadow: 0 0 16px rgba(232, 201, 106, 0.45);
        transform: scale(1.02);
    }

    .product-thumbnail img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
    }

    /* Product Info */
    .product-info {
        padding-top: 5px;
    }

    .product-badge-pill {
        display: inline-flex;
        align-items: center;
        padding: 6px 16px;
        border-radius: 50px;
        background: rgba(232, 201, 106, 0.12);
        color: #E8C96A;
        border: 1px solid rgba(232, 201, 106, 0.35);
        font-size: 0.7rem;
        font-weight: 500;
        text-transform: uppercase;
        letter-spacing: 0.25em;
        margin-bottom: 18px;
    }

    .product-rating {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 15px;
        font-size: 0.88rem;
    }

    .product-stars {
        color: #E8C96A;
        font-size: 0.95rem;
        letter-spacing: 2px;
    }

    .product-review-count {
        color: rgba(245, 242, 240, 0.55);
        font-size: 0.82rem;
    }

    .product-title {
        font-family: var(--font-display, 'Cormorant Garamond', serif);
        margin: 0 0 16px;
        font-size: clamp(2.2rem, 3.2vw, 3rem);
        line-height: 1.15;
        font-weight: 500;
        color: #F5F2F0;
    }

    .product-description {
        margin: 0 0 25px;
        color: rgba(245, 242, 240, 0.72);
        line-height: 1.8;
        font-size: 0.96rem;
    }

    /* Price Box */
    .product-price-box {
        display: flex;
        align-items: baseline;
        gap: 12px;
        margin-bottom: 28px;
        padding: 16px 20px;
        background: rgba(255, 255, 255, 0.03);
        border: 1px solid rgba(200, 162, 90, 0.2);
        border-radius: 12px;
    }

    .product-price {
        font-family: var(--font-display, 'Cormorant Garamond', serif);
        font-size: 2.4rem;
        line-height: 1;
        font-weight: 600;
        color: #E8C96A;
    }

    .product-price-label {
        font-size: 0.75rem;
        text-transform: uppercase;
        letter-spacing: 0.15em;
        color: rgba(245, 242, 240, 0.5);
    }

    /* Product Options & Selects */
    .product-options {
        margin-top: 25px;
    }

    .product-option {
        margin-bottom: 22px;
    }

    .product-option-label {
        display: block;
        margin-bottom: 10px;
        font-size: 0.76rem;
        font-weight: 500;
        text-transform: uppercase;
        letter-spacing: 0.2em;
        color: #E8C96A;
    }

    .product-option-label span.req {
        color: #E8B8C7;
        margin-left: 3px;
    }

    .product-option-select {
        width: 100%;
        min-height: 50px;
        padding: 12px 18px;
        border: 1px solid rgba(200, 162, 90, 0.35);
        border-radius: 10px;
        background: #141414;
        color: #F5F2F0;
        font-size: 0.95rem;
        outline: none;
        cursor: pointer;
        transition: all 0.25s ease;
        appearance: none;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='%23E8C96A' viewBox='0 0 16 16'%3E%3Cpath fill-rule='evenodd' d='M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z'/%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: right 18px center;
        background-size: 14px;
    }

    .product-option-select:focus {
        border-color: #E8C96A;
        box-shadow: 0 0 0 3px rgba(232, 201, 106, 0.15);
    }

    .product-option-select option {
        background: #141414;
        color: #F5F2F0;
        padding: 10px;
    }

    /* Quantity + Cart Button */
    .purchase-row {
        display: flex;
        gap: 16px;
        align-items: center;
        margin-top: 28px;
    }

    .quantity-control {
        display: flex;
        align-items: center;
        border: 1px solid rgba(200, 162, 90, 0.35);
        border-radius: 10px;
        overflow: hidden;
        height: 52px;
        background: #141414;
    }

    .quantity-control button {
        width: 44px;
        height: 100%;
        border: 0;
        background: rgba(255, 255, 255, 0.04);
        color: #E8C96A;
        cursor: pointer;
        font-size: 1.15rem;
        transition: background 0.2s ease;
    }

    .quantity-control button:hover {
        background: rgba(232, 201, 106, 0.15);
    }

    .quantity-control input {
        width: 55px;
        height: 100%;
        border: 0;
        background: transparent;
        color: #F5F2F0;
        text-align: center;
        font-size: 1rem;
        font-weight: 500;
        outline: none;
    }

    .add-cart-button {
        flex: 1;
        min-height: 52px;
        border: 0;
        border-radius: 999px;
        background: var(--gradient-rose, linear-gradient(135deg, #E8B8C7 0%, #C8A25A 100%));
        color: #0B0B0B;
        font-size: 0.85rem;
        font-weight: 600;
        letter-spacing: 0.1em;
        text-transform: uppercase;
        cursor: pointer;
        transition: all 0.3s ease;
        box-shadow: 0 10px 30px -10px rgba(232, 184, 199, 0.4);
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
    }

    .add-cart-button:hover {
        transform: translateY(-2px);
        box-shadow: 0 15px 35px -8px rgba(232, 184, 199, 0.55);
        opacity: 0.95;
    }

    /* Benefits / Trust Badges */
    .product-benefits {
        margin-top: 35px;
        border-top: 1px solid rgba(255, 255, 255, 0.08);
        border-bottom: 1px solid rgba(255, 255, 255, 0.08);
        padding: 10px 0;
    }

    .product-benefit {
        display: flex;
        align-items: center;
        gap: 15px;
        padding: 14px 0;
        border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        font-size: 0.88rem;
        color: rgba(245, 242, 240, 0.8);
    }

    .product-benefit:last-child {
        border-bottom: 0;
    }

    .product-benefit-icon {
        width: 38px;
        height: 38px;
        border-radius: 50%;
        background: rgba(232, 201, 106, 0.1);
        border: 1px solid rgba(232, 201, 106, 0.25);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.05rem;
        color: #E8C96A;
        flex-shrink: 0;
    }

    .product-benefit strong {
        color: #F5F2F0;
        font-weight: 500;
    }

    /* Bulk Discounts */
    .bulk-discount-box {
        margin: 25px 0;
        border: 1px solid rgba(200, 162, 90, 0.3);
        border-radius: 12px;
        overflow: hidden;
        background: rgba(255, 255, 255, 0.02);
    }

    .bulk-discount-title {
        padding: 14px 18px;
        background: rgba(200, 162, 90, 0.12);
        font-size: 0.85rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.1em;
        color: #E8C96A;
    }

    .bulk-discount-table {
        width: 100%;
        border-collapse: collapse;
        font-size: 0.88rem;
    }

    .bulk-discount-table th,
    .bulk-discount-table td {
        padding: 12px 18px;
        text-align: left;
        border-top: 1px solid rgba(255, 255, 255, 0.08);
    }

    .bulk-discount-table th {
        font-weight: 500;
        color: rgba(245, 242, 240, 0.6);
    }

    .bulk-discount-table td {
        color: #F5F2F0;
    }

    /* Product Details Specs Section */
    .product-details-section {
        max-width: 1240px;
        margin: 70px auto 0;
        padding: 0 24px;
    }

    .product-details-card {
        background: rgba(18, 18, 18, 0.7);
        backdrop-filter: blur(16px);
        -webkit-backdrop-filter: blur(16px);
        border: 1px solid rgba(200, 162, 90, 0.3);
        border-radius: 20px;
        padding: 40px;
        box-shadow: 0 20px 50px rgba(0, 0, 0, 0.5);
    }

    .product-details-heading {
        font-family: var(--font-display, 'Cormorant Garamond', serif);
        margin: 0 0 28px;
        font-size: 2rem;
        color: #F5F2F0;
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .product-details-heading::after {
        content: '';
        flex: 1;
        height: 1px;
        background: linear-gradient(90deg, rgba(200, 162, 90, 0.6), transparent);
    }

    .product-details-table {
        width: 100%;
        border-collapse: collapse;
    }

    .product-details-table tr {
        border-bottom: 1px solid rgba(255, 255, 255, 0.07);
    }

    .product-details-table tr:last-child {
        border-bottom: 0;
    }

    .product-details-table td {
        padding: 16px 14px;
        font-size: 0.94rem;
        line-height: 1.6;
    }

    .product-details-table td:first-child {
        width: 32%;
        font-weight: 500;
        color: #E8C96A;
        letter-spacing: 0.02em;
    }

    .product-details-table td:last-child {
        color: rgba(245, 242, 240, 0.88);
    }

    /* Mobile Responsive */
    @media (max-width: 991px) {
        .product-detail-page {
            padding-top: 110px;
        }

        .product-detail-grid {
            grid-template-columns: 1fr;
            gap: 40px;
        }

        .product-gallery {
            position: static;
        }

        .product-title {
            font-size: 2.2rem;
        }
    }

    @media (max-width: 600px) {
        .product-detail-page {
            padding: 95px 0 60px;
        }

        .product-detail-wrap,
        .product-details-section {
            padding-left: 16px;
            padding-right: 16px;
        }

        .product-details-card {
            padding: 24px 18px;
        }

        .product-title {
            font-size: 1.85rem;
        }

        .purchase-row {
            flex-direction: column;
            align-items: stretch;
        }

        .quantity-control {
            width: 100%;
            justify-content: space-between;
        }

        .quantity-control button {
            flex: 0 0 60px;
        }

        .quantity-control input {
            flex: 1;
        }

        .add-cart-button {
            width: 100%;
        }

        .product-thumbnail {
            width: 68px;
            height: 68px;
            flex-basis: 68px;
        }

        .thumb-scroll-btn {
            display: none;
        }

        .gallery-arrow-btn {
            width: 40px;
            height: 40px;
            font-size: 1.1rem;
        }

        .product-details-table td:first-child {
            width: 40%;
            font-size: 0.86rem;
        }

        .product-details-table td:last-child {
            font-size: 0.86rem;
        }
    }
</style>

<section class="product-detail-page">

    <div class="product-detail-wrap">

        {{-- BACK TO SHOPPING --}}
        <div class="product-back-nav">
            <a href="{{ route('home') }}#wax" class="product-back-link">
                <i class="bi bi-arrow-left"></i>
                Back to All Products
            </a>
        </div>

        <div class="product-detail-grid">

            {{-- LEFT: PRODUCT GALLERY --}}
            <div class="product-gallery">

                {{-- MAIN IMAGE WITH ARROWS & SWIPE --}}
                <div class="product-main-image" id="productMainImageWrap">
                    <img
                        id="productMainImage"
                        src="{{ asset($gallery[0]) }}"
                        alt="{{ $product['name'] }}"
                        loading="eager"
                    >

                    @if(count($gallery) > 1)
                        {{-- PREV ARROW --}}
                        <button
                            type="button"
                            class="gallery-arrow-btn gallery-arrow-prev"
                            onclick="navigateGallery(-1)"
                            aria-label="Previous image"
                        >
                            <i class="bi bi-chevron-left"></i>
                        </button>

                        {{-- NEXT ARROW --}}
                        <button
                            type="button"
                            class="gallery-arrow-btn gallery-arrow-next"
                            onclick="navigateGallery(1)"
                            aria-label="Next image"
                        >
                            <i class="bi bi-chevron-right"></i>
                        </button>

                        {{-- COUNTER PILL --}}
                        <div class="gallery-counter-badge">
                            <span id="galleryCurrentIndex">1</span> / {{ count($gallery) }}
                        </div>
                    @endif
                </div>

                {{-- THUMBNAIL TRACK WITH SCROLL BUTTONS --}}
                @if(count($gallery) > 1)
                    <div class="product-thumbnails-wrapper">
                        <button
                            type="button"
                            class="thumb-scroll-btn thumb-scroll-prev"
                            onclick="scrollThumbTrack(-1)"
                            aria-label="Scroll thumbnails left"
                        >
                            <i class="bi bi-chevron-left"></i>
                        </button>

                        <div class="product-thumbnails" id="productThumbnailsTrack">
                            @foreach($gallery as $index => $image)
                                <button
                                    type="button"
                                    class="product-thumbnail {{ $index === 0 ? 'active' : '' }}"
                                    id="thumb-{{ $index }}"
                                    data-index="{{ $index }}"
                                    onclick="selectGalleryImage({{ $index }})"
                                    aria-label="View photo {{ $index + 1 }}"
                                >
                                    <img
                                        src="{{ asset($image) }}"
                                        alt="{{ $product['name'] }} view {{ $index + 1 }}"
                                        loading="lazy"
                                    >
                                </button>
                            @endforeach
                        </div>

                        <button
                            type="button"
                            class="thumb-scroll-btn thumb-scroll-next"
                            onclick="scrollThumbTrack(1)"
                            aria-label="Scroll thumbnails right"
                        >
                            <i class="bi bi-chevron-right"></i>
                        </button>
                    </div>
                @endif

            </div>

            {{-- RIGHT: PRODUCT INFORMATION --}}
            <div class="product-info">

                @if(!empty($product['badge']))
                    <div class="product-badge-pill">
                        <i class="bi bi-gem me-2"></i> {{ $product['badge'] }}
                    </div>
                @endif

                <div class="product-rating">
                    <span class="product-stars">
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                    </span>
                    <span class="product-review-count">
                        ({{ $product['reviews'] ?? 128 }} verified customer reviews)
                    </span>
                </div>

                <h1 class="product-title">
                    {{ $product['name'] }}
                </h1>

                @if(!empty($product['description']))
                    <p class="product-description">
                        {{ $product['description'] }}
                    </p>
                @endif

                {{-- PRICE BOX --}}
                <div class="product-price-box">
                    <div class="product-price">
                        {{ $currency }}<span id="productPrice">{{ number_format($startingPrice, 2) }}</span>
                    </div>
                    <span class="product-price-label">selected length price</span>
                </div>

                {{-- BULK DISCOUNTS TABLE (IF AVAILABLE) --}}
                @if(!empty($bulkDiscounts))
                    <div class="bulk-discount-box">
                        <div class="bulk-discount-title">
                            <i class="bi bi-tag-fill me-2"></i> Bulk Purchase Wholesale Discounts
                        </div>
                        <table class="bulk-discount-table">
                            <thead>
                                <tr>
                                    <th>Quantity</th>
                                    <th>Unit Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($bulkDiscounts as $discount)
                                    <tr>
                                        <td>{{ $discount['quantity'] }} Units+</td>
                                        <td>{{ $currency }}{{ number_format($discount['price'], 2) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif

                {{-- ADD TO CART FORM --}}
                <form
                    method="POST"
                    action="{{ route('shop.cart.add') }}"
                    id="productAddToCartForm"
                >
                    @csrf

                    <input
                        type="hidden"
                        name="product_id"
                        value="{{ $product['id'] }}"
                    >

                    {{-- PRODUCT OPTIONS (LENGTH, ETC.) --}}
                    @if(!empty($product['options']))
                        <div class="product-options">
                            @foreach($product['options'] as $optionIndex => $option)
                                <div class="product-option">
                                    <label
                                        class="product-option-label"
                                        for="option_{{ $optionIndex }}"
                                    >
                                        {{ $option['name'] }}
                                        @if(!empty($option['required']))
                                            <span class="req">*</span>
                                        @endif
                                    </label>

                                    <select
                                        id="option_{{ $optionIndex }}"
                                        name="option_{{ $optionIndex }}"
                                        class="product-option-select product-option-input"
                                        data-option-index="{{ $optionIndex }}"
                                        {{ !empty($option['required']) ? 'required' : '' }}
                                    >
                                        @foreach($option['values'] ?? [] as $valueIndex => $value)
                                            <option
                                                value="{{ $value['label'] }}"
                                                data-price="{{ $value['price'] ?? '' }}"
                                                {{ $valueIndex === 0 ? 'selected' : '' }}
                                            >
                                                {{ $value['label'] }} — {{ $currency }}{{ number_format($value['price'], 2) }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            @endforeach
                        </div>
                    @endif

                    {{-- QUANTITY & SUBMIT --}}
                    <div class="product-option">
                        <label
                            class="product-option-label"
                            for="productQuantity"
                        >
                            Quantity
                        </label>

                        <div class="purchase-row mt-0">
                            <div class="quantity-control">
                                <button
                                    type="button"
                                    onclick="changeQuantity(-1)"
                                    aria-label="Decrease quantity"
                                >
                                    −
                                </button>

                                <input
                                    type="number"
                                    id="productQuantity"
                                    name="quantity"
                                    value="1"
                                    min="1"
                                    max="99"
                                >

                                <button
                                    type="button"
                                    onclick="changeQuantity(1)"
                                    aria-label="Increase quantity"
                                >
                                    +
                                </button>
                            </div>

                            <button
                                type="submit"
                                class="add-cart-button"
                            >
                                <i class="bi bi-bag-plus"></i>
                                Add to Cart
                            </button>
                        </div>
                    </div>

                </form>

                {{-- TRUST & BENEFITS --}}
                <div class="product-benefits">
                    <div class="product-benefit">
                        <div class="product-benefit-icon">
                            <i class="bi bi-truck"></i>
                        </div>
                        <div>
                            <strong>Worldwide Fast Delivery</strong><br>
                            Express tracked shipping directly to your doorstep.
                        </div>
                    </div>

                    <div class="product-benefit">
                        <div class="product-benefit-icon">
                            <i class="bi bi-patch-check"></i>
                        </div>
                        <div>
                            <strong>100% Virgin Human Hair</strong><br>
                            Premium cuticle-intact hair for natural bounce and longevity.
                        </div>
                    </div>

                    <div class="product-benefit">
                        <div class="product-benefit-icon">
                            <i class="bi bi-shield-lock"></i>
                        </div>
                        <div>
                            <strong>Secure Checkout</strong><br>
                            Protected transactions with encrypted billing.
                        </div>
                    </div>
                </div>

            </div>

        </div>

        {{-- PRODUCT SPECIFICATIONS & DETAILS TABLE --}}
        @if(!empty($product['details']))
            <div class="product-details-section">
                <div class="product-details-card">
                    <h2 class="product-details-heading">
                        Product Specifications
                    </h2>

                    <table class="product-details-table">
                        <tbody>
                            @foreach($product['details'] as $label => $value)
                                <tr>
                                    <td>{{ $label }}</td>
                                    <td>{{ $value }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif

    </div>

</section>

<script>
    // Gallery Image List
    const galleryImages = @json(array_map('asset', $gallery));
    let currentGalleryIndex = 0;

    function selectGalleryImage(index) {
        if (index < 0) {
            index = galleryImages.length - 1;
        } else if (index >= galleryImages.length) {
            index = 0;
        }

        currentGalleryIndex = index;
        const mainImage = document.getElementById('productMainImage');
        const counter = document.getElementById('galleryCurrentIndex');

        if (mainImage) {
            mainImage.style.opacity = '0.35';
            const tempImg = new Image();
            tempImg.src = galleryImages[currentGalleryIndex];
            tempImg.onload = function() {
                mainImage.src = galleryImages[currentGalleryIndex];
                mainImage.style.opacity = '1';
            };
        }

        if (counter) {
            counter.textContent = currentGalleryIndex + 1;
        }

        // Highlight active thumbnail and scroll into view
        document.querySelectorAll('.product-thumbnail').forEach(function (thumb, i) {
            if (i === currentGalleryIndex) {
                thumb.classList.add('active');
                thumb.scrollIntoView({ behavior: 'smooth', block: 'nearest', inline: 'center' });
            } else {
                thumb.classList.remove('active');
            }
        });
    }

    function navigateGallery(direction) {
        selectGalleryImage(currentGalleryIndex + direction);
    }

    function scrollThumbTrack(direction) {
        const track = document.getElementById('productThumbnailsTrack');
        if (track) {
            track.scrollBy({ left: direction * 220, behavior: 'smooth' });
        }
    }

    // Touch Swipe Support on Main Image Container
    const mainImgWrap = document.getElementById('productMainImageWrap');
    if (mainImgWrap) {
        let touchStartX = 0;
        let touchEndX = 0;

        mainImgWrap.addEventListener('touchstart', function(e) {
            touchStartX = e.changedTouches[0].screenX;
        }, { passive: true });

        mainImgWrap.addEventListener('touchend', function(e) {
            touchEndX = e.changedTouches[0].screenX;
            const diff = touchEndX - touchStartX;
            if (Math.abs(diff) > 40) {
                if (diff < 0) {
                    navigateGallery(1); // Swipe left -> Next
                } else {
                    navigateGallery(-1); // Swipe right -> Prev
                }
            }
        }, { passive: true });
    }

    // Keyboard Arrow Keys (Left & Right)
    document.addEventListener('keydown', function(e) {
        if (e.target.tagName === 'INPUT' || e.target.tagName === 'TEXTAREA' || e.target.tagName === 'SELECT') {
            return;
        }
        if (e.key === 'ArrowLeft') {
            navigateGallery(-1);
        } else if (e.key === 'ArrowRight') {
            navigateGallery(1);
        }
    });

    // Quantity Counter
    function changeQuantity(amount) {
        const input = document.getElementById('productQuantity');
        if (!input) return;

        let quantity = parseInt(input.value || 1, 10);
        quantity += amount;

        if (quantity < 1) {
            quantity = 1;
        } else if (quantity > 99) {
            quantity = 99;
        }

        input.value = quantity;
    }

    // Live Price Calculation on Option Change
    document.addEventListener('DOMContentLoaded', function () {
        const priceElement = document.getElementById('productPrice');
        const firstOption = document.querySelector('#option_0');

        if (!priceElement || !firstOption) return;

        function updateProductPrice() {
            const selectedOption = firstOption.options[firstOption.selectedIndex];
            if (!selectedOption) return;

            const price = selectedOption.getAttribute('data-price');
            if (price) {
                priceElement.textContent = parseFloat(price).toFixed(2);
            }
        }

        firstOption.addEventListener('change', updateProductPrice);
        updateProductPrice();
    });
</script>

@endsection
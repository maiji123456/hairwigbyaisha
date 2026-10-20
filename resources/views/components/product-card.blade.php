@props(['item'])

<div class="col-12 col-sm-6 col-lg-4 d-flex">

  <div class="product-card position-relative overflow-hidden rounded-4 bg-card-custom gold-border w-100 d-flex flex-column">

    {{-- Product Image --}}
    <a href="{{ route('shop.product', ['productId' => $item['id']]) }}" class="text-decoration-none d-block">
      <div class="position-relative overflow-hidden" style="aspect-ratio:4/5;">

        <img src="{{ asset($item['image']) }}" alt="{{ $item['name'] }}" loading="lazy" class="product-img w-100 h-100"
          style="object-fit:cover;">

        <div class="position-absolute w-100 h-100 top-0 start-0"
          style="background:linear-gradient(0deg, rgba(0,0,0,0.7) 0%, transparent 50%, transparent 100%);">
        </div>

        @if (!empty($item['badge']))
          <span class="position-absolute top-0 start-0 m-3 rounded-pill px-3 py-1 gold-border"
            style="font-size:0.6rem; text-transform:uppercase; letter-spacing:0.25em; color:#E8C96A; background:rgba(14,14,14,0.6); backdrop-filter:blur(4px);">
            {{ $item['badge'] }}
          </span>
        @endif

      </div>
    </a>


    {{-- Product Content --}}
    <div class="p-4 d-flex flex-column flex-grow-1">

      {{-- Rating --}}
      <div class="d-flex align-items-center justify-content-between">

        <div class="d-flex gap-0 text-gold-gradient" style="font-size:0.875rem;">
          @for ($i = 0; $i < 5; $i++)
            <i class="bi bi-star-fill"></i>
          @endfor
        </div>

        <span style="font-size:0.75rem; color:rgba(245,242,240,0.5);">
          ({{ $item['reviews'] ?? 0 }})
        </span>

      </div>


      {{-- Product Name --}}
      <h3 class="font-display text-foreground mt-2 mb-0" style="font-size:1.05rem; line-height:1.45; min-height:3.05rem; display:-webkit-box; -webkit-line-clamp:2; -webkit-box-orient:vertical; overflow:hidden;" title="{{ $item['name'] }}">
        <a href="{{ route('shop.product', ['productId' => $item['id']]) }}"
          class="text-decoration-none text-foreground">
          {{ $item['name'] }}
        </a>
      </h3>


      {{-- Bottom Section (Price, Button, Free Shipping) Aligned to Bottom --}}
      <div class="mt-auto pt-3">

        {{-- Starting Price --}}
        @php
          $firstOption = $item['options'][0] ?? null;
          $firstValue = $firstOption['values'][0] ?? null;
        @endphp

        @if ($firstValue)
          <div>
            <span style="font-size:0.7rem; color:rgba(245,242,240,0.5); text-transform:uppercase; letter-spacing:0.12em;">
              From
            </span>

            <span class="font-display text-gold-gradient ms-1" style="font-size:1.35rem;">
              {{ config('site.currency_symbol', '£') }}{{ number_format($firstValue['price'], 2) }}
            </span>
          </div>
        @endif


        {{-- View Product --}}
        <a href="{{ route('shop.product', ['productId' => $item['id']]) }}"
          class="btn-luxe w-100 mt-3 text-decoration-none text-center d-block">
          <i class="bi bi-eye me-1"></i>
          View Product
        </a>


        <div class="text-end mt-2"
          style="font-size:0.65rem; text-transform:uppercase; letter-spacing:0.2em; color:rgba(245,242,240,0.6);">
          Free shipping
        </div>

      </div>

    </div>

  </div>

</div>
<header class="fixed-top w-100" style="z-index: 1050;">
    <div class="glass-panel rounded-pill d-flex align-items-center justify-content-between px-3 py-2 mx-auto mt-4" style="max-width:1320px;">
      <a href="{{ route('home') }}" class="d-flex align-items-center gap-3 text-decoration-none flex-shrink-0">
        <img src="{{ asset('assets/images/luxehair-logo.png') }}" alt="LuxeHair by Aisha" class="rounded-circle" style="width:44px; height:44px; object-fit:cover;">
        <div class="d-none d-sm-block lh-1">
          <div class="font-display" style="font-size:1.125rem; background:var(--gradient-rose); -webkit-background-clip:text; background-clip:text; color:transparent;">LuxeHair</div>
          <div class="eyebrow" style="font-size:0.55rem;">by Aisha</div>
        </div>
      </a>
      <nav class="d-none d-lg-flex align-items-center gap-4">
        @foreach (config('site.nav') as $link)
          @php
            $navHref = str_starts_with($link['href'], '#')
              ? ($link['href'] === '#home'
                  ? (request()->routeIs('home') ? '#home' : route('home'))
                  : (request()->routeIs('home') ? $link['href'] : route('home') . $link['href']))
              : $link['href'];
          @endphp
          <a href="{{ $navHref }}" class="nav-link-luxe text-decoration-none">{{ $link['label'] }}</a>
        @endforeach
      </nav>
      <div class="d-flex align-items-center gap-1">
        <button class="icon-btn" aria-label="Search"><i class="bi bi-search"></i></button>
        <button class="icon-btn" aria-label="Account"><i class="bi bi-person"></i></button>
        <a href="{{ route('shop.cart') }}" class="icon-btn position-relative text-decoration-none" aria-label="Cart">
          <i class="bi bi-bag"></i>
          @php $cartTotalQty = collect(session('cart', []))->sum('quantity'); @endphp
          @if ($cartTotalQty > 0)
            <span class="cart-badge">{{ $cartTotalQty }}</span>
          @endif
        </a>
        <a href="{{ request()->routeIs('home') ? '#booking' : route('home') . '#booking' }}" class="btn-luxe d-none d-md-inline-flex ms-2">Book Appointment</a>
        <button id="menuToggle" class="icon-btn d-lg-none" aria-label="Menu"><i id="menuIcon" class="bi bi-list fs-5"></i></button>
      </div>
    </div>
  <div id="mobileMenu" class="d-lg-none mobile-nav" style="display:none;">
    <div class="d-flex flex-column gap-3">
      @foreach (config('site.nav') as $link)
        @php
          $mobileHref = str_starts_with($link['href'], '#')
            ? ($link['href'] === '#home'
                ? (request()->routeIs('home') ? '#home' : route('home'))
                : (request()->routeIs('home') ? $link['href'] : route('home') . $link['href']))
            : $link['href'];
        @endphp
        <a href="{{ $mobileHref }}" class="nav-link-luxe text-decoration-none mobile-link">{{ $link['label'] }}</a>
      @endforeach
      <a href="{{ request()->routeIs('home') ? '#booking' : route('home') . '#booking' }}" class="btn-luxe mt-2 w-100 text-center text-decoration-none mobile-link">Book Appointment</a>
    </div>
  </div>
</header>

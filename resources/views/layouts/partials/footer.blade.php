<footer id="contact" class="border-top pt-5 pb-4" style="border-color:rgba(200,162,90,0.2)!important;background:#141414;">
  <div class="container" style="max-width:1320px;">
    <div class="footer-grid">
      <div class="footer-grid-brand">
        <div class="d-flex align-items-center gap-3">
          <img src="{{ asset('assets/images/luxehair-logo.png') }}" alt="LuxeHair by Aisha" class="rounded-circle" style="width:56px; height:56px; object-fit:cover;">
          <div>
            <div class="font-display text-rose-gradient" style="font-size:1.5rem;">LuxeHair</div>
            <div class="eyebrow" style="font-size:0.6rem;">by Aisha &#8226; Luxury You Can Wear</div>
          </div>
        </div>
        <p class="mt-4 text-foreground-60" style="max-width:24rem;font-size:0.875rem;">A couture hair house crafting premium hair, luxury care and unforgettable salon rituals since 2015.</p>
        <form class="mt-4 d-flex gap-2" style="max-width:24rem;" onsubmit="event.preventDefault();">
          <input type="email" placeholder="Enter your email" aria-label="Email address" autocomplete="email" class="form-control glass-panel" style="flex:1;border-radius:999px;border:1px solid rgba(255,255,255,0.12);padding:0.7rem 1.2rem;font-size:0.9rem;color:var(--foreground);background:transparent;">
          <button class="btn-luxe" style="padding:0.6rem 1.5rem;font-size:0.78rem;">Join</button>
        </form>
        <div class="mt-4 d-flex gap-2">
          <a href="https://www.instagram.com/luxehairbyaisha?utm_source=qr" class="social-icon"><i class="bi bi-instagram"></i></a>
          <a href="https://www.facebook.com/share/1MmcokJbP8/?mibextid=wwXIfr" class="social-icon"><i class="bi bi-facebook"></i></a>
          <a href="#" class="social-icon"><i class="bi bi-youtube"></i></a>
        </div>
      </div>
      <div>
        <h4 class="eyebrow mb-3">Quick Links</h4>
        <ul class="list-unstyled d-flex flex-column gap-2 text-foreground-70" style="font-size:0.875rem;">
          @foreach (config('site.footer_quick_links') as $link)
            @php
              $footerHref = str_starts_with($link['href'], '#')
                ? ($link['href'] === '#home'
                    ? (request()->routeIs('home') ? '#home' : route('home'))
                    : (request()->routeIs('home') ? $link['href'] : route('home') . $link['href']))
                : $link['href'];
            @endphp
            <li><a href="{{ $footerHref }}" class="footer-link">{{ $link['label'] }}</a></li>
          @endforeach
        </ul>
      </div>
      <div>
        <h4 class="eyebrow mb-3">Services</h4>
        <ul class="list-unstyled d-flex flex-column gap-2 text-foreground-70" style="font-size:0.875rem;">
          @foreach (config('site.footer_services') as $link)
            @php
              $footerHref = str_starts_with($link['href'], '#')
                ? ($link['href'] === '#home'
                    ? (request()->routeIs('home') ? '#home' : route('home'))
                    : (request()->routeIs('home') ? $link['href'] : route('home') . $link['href']))
                : $link['href'];
            @endphp
            <li><a href="{{ $footerHref }}" class="footer-link">{{ $link['label'] }}</a></li>
          @endforeach
        </ul>
      </div>
      <div>
        <h4 class="eyebrow mb-3">Get in Touch</h4>
        <ul class="list-unstyled d-flex flex-column gap-3 text-foreground-70" style="font-size:0.875rem;">
          <li class="d-flex align-items-start gap-3"><i class="bi bi-geo-alt" style="color:#E8C96A;margin-top:0.125rem;"></i> 24 Rose Boulevard,<br>Beverly Hills, CA</li>
          <li class="d-flex align-items-center gap-3"><i class="bi bi-telephone" style="color:#E8C96A;"></i> +44 7539 593290</li>
          <li class="d-flex align-items-center gap-3"><i class="bi bi-envelope" style="color:#E8C96A;"></i> hello@luxehair.co</li>
          <li class="d-flex align-items-start gap-3"><i class="bi bi-clock" style="color:#E8C96A;margin-top:0.125rem;"></i> Mon&#8211;Sat 10:00&#8211;20:00<br>Sun by appointment</li>
        </ul>
      </div>
    </div>
    <div class="gold-line mt-5"></div>
    <div class="mt-4 d-flex flex-column flex-md-row align-items-center justify-content-between gap-2" style="font-size:0.75rem;color:rgba(245,242,240,0.5);">
      <p class="mb-0">&copy; 2026 LuxeHair by Aisha. All rights reserved.</p>
      <p class="mb-0 d-flex align-items-center gap-1">Crafted with <i class="bi bi-heart-fill" style="color:#E8B8C7;font-size:0.75rem;"></i> for hair lovers.</p>
    </div>
  </div>
</footer>

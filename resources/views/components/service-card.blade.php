@props(['item'])
<div class="col-12 col-md-6 col-lg-3">
  <div class="service-card hover-lift overflow-hidden rounded-4 bg-card-custom gold-border h-100">
    <div class="position-relative overflow-hidden" style="aspect-ratio:4/5;">
      <img src="{{ asset($item['image']) }}" alt="{{ $item['title'] }}" loading="lazy" class="service-img w-100 h-100" style="object-fit:cover;">
      <div class="position-absolute w-100 h-100 top-0 start-0" style="background:linear-gradient(0deg, #000 0%, rgba(0,0,0,0.3) 50%, transparent 100%);"></div>
      <div class="position-absolute bottom-0 start-0 end-0 p-3">
        <div style="font-size:0.65rem; text-transform:uppercase; letter-spacing:0.3em; color:#E8C96A;">{{ $item['price'] }}</div>
        <h3 class="font-display text-white mt-1" style="font-size:1.25rem;">{{ $item['title'] }}</h3>
      </div>
    </div>
    <div class="p-4">
      <p style="font-size:0.875rem; color:rgba(245,242,240,0.7);">{{ $item['text'] }}</p>
      <a href="#booking" class="d-inline-flex align-items-center gap-2 text-decoration-none" style="font-size:0.72rem; text-transform:uppercase; letter-spacing:0.25em; color:#E8C96A;">Book Now <i class="bi bi-arrow-right"></i></a>
    </div>
  </div>
</div>

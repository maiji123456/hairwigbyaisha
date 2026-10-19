@props(['item', 'featured' => false])
<a href="#shop" class="text-decoration-none{{ $featured ? ' categories-grid-first' : '' }}">
  <div class="category-img-wrap position-relative overflow-hidden rounded-4 gold-border bg-card-custom h-100 hover-lift">
    <div class="position-relative{{ $featured ? ' h-100' : '' }}"@unless ($featured) style="aspect-ratio:4/5;"@endunless>
      <img src="{{ asset($item['image']) }}" alt="{{ $item['title'] }}" loading="lazy" class="category-img w-100 h-100" style="object-fit:cover;">
      <div class="position-absolute w-100 h-100 top-0 start-0" style="background:linear-gradient(0deg, #000 0%, rgba(0,0,0,0.4) 50%, transparent 100%);"></div>
      <div class="position-absolute top-0 start-0 p-3 glass-panel rounded-pill px-3 py-1 m-3" style="font-size:0.65rem; text-transform:uppercase; letter-spacing:0.25em; color:#E8C96A;">{{ $item['badge'] }}</div>
      <div class="position-absolute bottom-0 start-0 end-0 p-4 d-flex align-items-end justify-content-between">
        <div>
          <h3 class="font-display text-white" style="font-size:1.5rem;">{{ $item['title'] }}</h3>
          <div class="cat-line" style="height:1px; width:2.5rem; background:#E8C96A; transition:width 0.5s;"></div>
        </div>
        <span class="cat-arrow d-grid place-items-center rounded-circle" style="width:2.75rem; height:2.75rem; background:#E8B8C7; color:#0B0B0B; transition:transform 0.5s;"><i class="bi bi-arrow-right"></i></span>
      </div>
    </div>
  </div>
</a>

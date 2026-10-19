<section id="wax" class="section-padding">
  <div class="container" style="max-width:1320px;">
    <div class="d-flex align-items-end justify-content-between gap-4 mb-5">
      <div>
        <div class="d-flex align-items-center gap-3">
          <span style="width:2rem; height:1px; background:rgba(200,162,90,0.7);"></span>
          <span class="eyebrow">Featured Products</span>
        </div>
        <h2 class="font-display text-foreground mt-3" style="font-size:2.5rem;">This week's <span class="text-rose-gradient fst-italic">obsessions</span></h2>
      </div>
      <div class="d-none d-md-flex align-items-center gap-2">
        <button class="glass-panel d-grid place-items-center rounded-circle" style="width:2.75rem; height:2.75rem; border:none; color:white; cursor:pointer;"><i class="bi bi-chevron-left"></i></button>
        <button class="d-grid place-items-center rounded-circle" style="width:2.75rem; height:2.75rem; border:none; background:#E8B8C7; color:#0B0B0B; cursor:pointer;"><i class="bi bi-chevron-right"></i></button>
      </div>
    </div>
    <div class="row g-4">
      @foreach (config('site.products') as $item)
        <x-product-card :item="$item" />
      @endforeach
    </div>
  </div>
</section>

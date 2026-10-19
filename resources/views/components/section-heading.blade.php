@props(['eyebrow', 'description' => null])
<div class="text-center mx-auto mb-5" style="max-width:36rem;">
  <div class="d-flex align-items-center justify-content-center gap-3">
    <span style="width:2rem; height:1px; background:rgba(200,162,90,0.7);"></span>
    <span class="eyebrow">{{ $eyebrow }}</span>
    <span style="width:2rem; height:1px; background:rgba(200,162,90,0.7);"></span>
  </div>
  <h2 class="font-display text-foreground mt-3" style="font-size:2.5rem;">{{ $slot }}</h2>
  @if ($description)
    <p class="text-foreground-65 mt-3">{{ $description }}</p>
  @endif
</div>

@props(['item'])
<div class="col-12 col-md-4">
  <div class="glass-panel hover-lift rounded-4 p-4 h-100">
    <div class="font-display" style="font-size:3.5rem;line-height:1;color:rgba(232,184,199,0.4);">&ldquo;</div>
    <blockquote class="font-display mt-2 fst-italic" style="font-size:1.125rem;line-height:1.6;color:rgba(245,242,240,0.9);">{{ $item['quote'] }}</blockquote>
    <div class="mt-4 d-flex align-items-center gap-3">
      <div class="d-grid place-items-center rounded-circle font-display" style="width:3rem;height:3rem;flex-shrink:0;background:var(--gradient-rose);font-size:1.25rem;color:#0B0B0B;">{{ $item['initial'] }}</div>
      <div>
        <div style="font-size:0.875rem;font-weight:500;">{{ $item['name'] }}</div>
        <div style="font-size:0.75rem;color:rgba(245,242,240,0.6);">{{ $item['role'] }}</div>
      </div>
      <div class="ms-auto d-flex text-gold-gradient" style="font-size:0.75rem;">@for ($i = 0; $i < 5; $i++)<i class="bi bi-star-fill"></i>@endfor</div>
    </div>
  </div>
</div>

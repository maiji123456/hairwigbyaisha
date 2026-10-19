@props(['item'])
<div class="col-6 col-md-3">
  <div class="glass-panel hover-lift d-flex flex-column align-items-center justify-content-center text-center rounded-4 p-4" style="min-height:150px;">
    <div class="d-grid place-items-center rounded-circle gold-border feature-icon-wrap" style="width:3.5rem; height:3.5rem; background:#0B0B0B; transition:background 0.3s;"><i class="bi {{ $item['icon'] }}" style="color:#E8C96A; font-size:1.3rem;"></i></div>
    <div class="mt-3 text-foreground-90" style="font-size:0.875rem; font-weight:500; letter-spacing:0.02em;">{{ $item['label'] }}</div>
  </div>
</div>

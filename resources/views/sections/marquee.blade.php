<section style="border-top:1px solid rgba(200,162,90,0.25); border-bottom:1px solid rgba(200,162,90,0.25); background:#1C1C1C; overflow:hidden; padding:0.75rem 0;">
  <div class="animate-marquee d-flex" style="white-space:nowrap; gap:2.5rem; width:max-content;">
    @for ($i = 0; $i < 3; $i++)
      @foreach (config('site.marquee') as $message)
        <span style="text-transform:uppercase; letter-spacing:0.35em; font-size:0.72rem; color:#E8C96A;">{{ $message }}</span>
        <span style="color:#E8B8C7;">★</span>
      @endforeach
    @endfor
  </div>
</section>

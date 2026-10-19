<section id="gallery" class="section-padding">
  <div class="container" style="max-width:1320px;">
    <x-section-heading eyebrow="Before & After" description="Drag the divider — witness the difference a master's hand makes.">The <span class="text-gold-gradient fst-italic">LuxeHair</span> Transformation</x-section-heading>
    <div class="row justify-content-center">
      <div class="col-12" style="max-width:1200px;">
        <div class="position-relative overflow-hidden rounded-4 gold-border user-select-none" style="box-shadow:var(--shadow-luxe);">
          <div class="position-relative" id="beforeAfterContainer" style="aspect-ratio:16/10;">
            <img src="{{ asset('assets/images/before-after.jpg') }}" alt="Hair transformation" loading="lazy" class="position-absolute w-100 h-100" style="top:0;left:0;object-fit:cover;object-position:left;">
            <div class="position-absolute h-100 overflow-hidden" id="beforeImage" style="top:0;left:0;width:50%;">
              <img src="{{ asset('assets/images/before-after.jpg') }}" alt="" class="position-absolute h-100" id="beforeImageInner" style="top:0;left:0;object-fit:cover;object-position:left;filter:grayscale(1) contrast(0.75);width:200%;">
              <div class="position-absolute bottom-0 start-0 p-3">
                <span class="glass-panel rounded-pill px-3 py-1" style="font-size:0.65rem;text-transform:uppercase;letter-spacing:0.3em;color:#E8C96A;">Before</span>
              </div>
            </div>
            <div class="position-absolute bottom-0 end-0 p-3">
              <span class="glass-panel rounded-pill px-3 py-1" style="font-size:0.65rem;text-transform:uppercase;letter-spacing:0.3em;color:#E8C96A;">After</span>
            </div>
            <div class="position-absolute d-flex align-items-center justify-content-center" id="sliderHandle" style="top:0;bottom:0;left:50%;transform:translateX(-50%);cursor:ew-resize;z-index:5;">
              <div style="width:2px;height:100%;background:#E8C96A;box-shadow:0 0 20px rgba(232,201,106,0.8);"></div>
              <div class="position-absolute top-50 start-50 translate-middle d-grid place-items-center rounded-circle" style="width:3rem;height:3rem;background:#E8B8C7;color:#0B0B0B;box-shadow:0 4px 20px rgba(0,0,0,0.5);">
                <div class="d-flex"><i class="bi bi-chevron-left"></i><i class="bi bi-chevron-right" style="margin-left:-0.25rem;"></i></div>
              </div>
            </div>
            <input type="range" id="beforeAfterSlider" aria-label="Before and after comparison slider" min="0" max="100" value="50" class="position-absolute w-100 h-100" style="top:0;left:0;opacity:0;cursor:ew-resize;z-index:10;">
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

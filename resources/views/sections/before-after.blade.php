<section id="gallery" class="section-padding position-relative overflow-hidden" style="background: radial-gradient(circle at 50% 30%, rgba(200,162,90,0.06) 0%, transparent 70%);">
  <div class="container" style="max-width:1320px;">
    
    <!-- Section Heading -->
    <x-section-heading eyebrow="Real Client Transformations" description="Drag the divider to witness how our bespoke luxury wigs restore instant confidence, length, and dramatic volume.">
      The <span class="text-gold-gradient fst-italic">LuxeHair</span> Transformation
    </x-section-heading>

    <!-- Look Switcher Tabs -->
    <div class="d-flex flex-wrap justify-content-center align-items-center gap-2 gap-md-3 mb-4">
      <button type="button" 
              class="transformation-tab-btn active px-4 py-2 rounded-pill border d-inline-flex align-items-center gap-2 text-decoration-none" 
              data-before="{{ asset('assets/images/transformation-before.jpg') }}" 
              data-after="{{ asset('assets/images/transformation-after.jpg') }}"
              data-title="Look 01: Brunette Balayage Glamour"
              data-specs="24&quot; HD Lace Front Wig • 180% High Density • Warm Caramel Balayage • 100% Virgin Remy Hair"
              style="font-size:0.85rem; font-weight:500; letter-spacing:0.04em; transition:all 0.3s ease; border-color:#E8C96A !important; background:linear-gradient(135deg, rgba(232,201,106,0.18), rgba(232,184,199,0.18)); color:#F5F2F0; cursor:pointer;">
        <span class="rounded-circle" style="width:8px; height:8px; background:#E8C96A; box-shadow:0 0 10px #E8C96A;"></span>
        Look 01: Brunette Balayage Waves
      </button>

      <button type="button" 
              class="transformation-tab-btn px-4 py-2 rounded-pill border d-inline-flex align-items-center gap-2 text-decoration-none" 
              data-before="{{ asset('assets/images/transformation-before-blonde.jpg') }}" 
              data-after="{{ asset('assets/images/transformation-after-blonde.jpg') }}"
              data-title="Look 02: Honey Blonde Luxury Melt"
              data-specs="26&quot; Full Lace Frontal Wig • Pre-Plucked Natural Hairline • Sun-Kissed Honey Blonde • 100% Human Hair"
              style="font-size:0.85rem; font-weight:500; letter-spacing:0.04em; transition:all 0.3s ease; border-color:rgba(255,255,255,0.15); background:rgba(255,255,255,0.03); color:#B8B8B8; cursor:pointer;">
        <span class="rounded-circle" style="width:8px; height:8px; background:rgba(255,255,255,0.4);"></span>
        Look 02: Honey Blonde Luxury Melt
      </button>
    </div>

    <div class="row justify-content-center">
      <div class="col-12" style="max-width:1150px;">
        
        <!-- Interactive Comparison Container -->
        <div class="position-relative overflow-hidden rounded-4 gold-border user-select-none shadow-lg" style="box-shadow:var(--shadow-luxe); background:#121212;">
          
          <div class="position-relative w-100" id="beforeAfterContainer" style="aspect-ratio:16/9; --slider-pos:50%;">
            
            <!-- AFTER IMAGE (Base Layer) -->
            <img id="afterImage" 
                 src="{{ asset('assets/images/transformation-after.jpg') }}" 
                 alt="After LuxeHair Wig Transformation" 
                 loading="lazy" 
                 class="position-absolute w-100 h-100 top-0 start-0" 
                 style="object-fit:cover; object-position:center; display:block;">
            
            <!-- BEFORE IMAGE (Overlay with Clip-Path) -->
            <img id="beforeImage" 
                 src="{{ asset('assets/images/transformation-before.jpg') }}" 
                 alt="Before LuxeHair Wig Transformation" 
                 loading="lazy" 
                 class="position-absolute w-100 h-100 top-0 start-0" 
                 style="object-fit:cover; object-position:center; clip-path:inset(0 50% 0 0); -webkit-clip-path:inset(0 50% 0 0); display:block;">

            <!-- Subtle Gradient Shadow at bottom for legibility -->
            <div class="position-absolute bottom-0 start-0 w-100 pointer-events-none" style="height:120px; background:linear-gradient(to top, rgba(11,11,11,0.85) 0%, transparent 100%); z-index:2;"></div>

            <!-- BEFORE Floating Pill Badge -->
            <div class="position-absolute bottom-0 start-0 p-3 p-md-4" style="z-index:3;">
              <span class="glass-panel rounded-pill px-3 py-1 d-inline-flex align-items-center gap-2" style="font-size:0.75rem; text-transform:uppercase; letter-spacing:0.2em; color:#E8B8C7; border:1px solid rgba(232,184,199,0.3); background:rgba(11,11,11,0.65);">
                <span style="width:6px; height:6px; border-radius:50%; background:#E8B8C7;"></span>
                Before: Natural Hair
              </span>
            </div>

            <!-- AFTER Floating Pill Badge -->
            <div class="position-absolute bottom-0 end-0 p-3 p-md-4" style="z-index:3;">
              <span class="glass-panel rounded-pill px-3 py-1 d-inline-flex align-items-center gap-2" style="font-size:0.75rem; text-transform:uppercase; letter-spacing:0.2em; color:#E8C96A; border:1px solid rgba(232,201,106,0.4); background:rgba(11,11,11,0.65);">
                <span style="width:6px; height:6px; border-radius:50%; background:#E8C96A; box-shadow:0 0 8px #E8C96A;"></span>
                After: LuxeHair HD Wig
              </span>
            </div>

            <!-- Interactive Slider Divider Handle -->
            <div class="position-absolute d-flex align-items-center justify-content-center pointer-events-none" id="sliderHandle" style="top:0; bottom:0; left:50%; transform:translateX(-50%); z-index:5;">
              <!-- Glowing vertical divider line -->
              <div style="width:3px; height:100%; background:linear-gradient(180deg, rgba(232,201,106,0.3) 0%, #E8C96A 30%, #E8C96A 70%, rgba(232,201,106,0.3) 100%); box-shadow:0 0 16px rgba(232,201,106,0.9);"></div>
              
              <!-- Luxury circular drag thumb button -->
              <div class="position-absolute top-50 start-50 translate-middle d-flex align-items-center justify-content-center rounded-circle" style="width:3.25rem; height:3.25rem; background:linear-gradient(135deg, #E8C96A 0%, #C8A25A 100%); color:#0B0B0B; box-shadow:0 0 25px rgba(232,201,106,0.8), 0 4px 15px rgba(0,0,0,0.6); border:2px solid #FFF;">
                <div class="d-flex align-items-center justify-content-center" style="font-size:1rem; font-weight:bold;">
                  <i class="bi bi-chevron-left" style="margin-right:-2px;"></i>
                  <i class="bi bi-chevron-right" style="margin-left:-2px;"></i>
                </div>
              </div>
            </div>

            <!-- Accessible & Smooth Slider Input -->
            <input type="range" 
                   id="beforeAfterSlider" 
                   aria-label="Drag before and after transformation slider" 
                   min="0" 
                   max="100" 
                   value="50" 
                   class="position-absolute w-100 h-100 top-0 start-0 m-0" 
                   style="opacity:0; cursor:ew-resize; z-index:10; -webkit-tap-highlight-color:transparent;">
          </div>

          <!-- Bottom Transformation Info Bar -->
          <div class="p-3 p-md-4 glass-panel border-top border-white-10 d-flex flex-column flex-md-row justify-content-between align-items-center gap-3" style="background:rgba(18,18,18,0.95);">
            <div>
              <div class="d-flex align-items-center gap-2 mb-1">
                <i class="bi bi-stars text-gold" style="color:#E8C96A;"></i>
                <h4 id="transformationTitle" class="m-0 fs-5 text-white" style="font-family:var(--font-sans); font-weight:600;">Look 01: Brunette Balayage Glamour</h4>
              </div>
              <p id="transformationSpecs" class="m-0" style="font-size:0.85rem; color:rgba(255,255,255,0.78);">
                24" HD Lace Front Wig • 180% High Density • Warm Caramel Balayage • 100% Virgin Remy Hair
              </p>
            </div>
            <div class="d-flex align-items-center gap-2">
              <a href="#shop" class="btn btn-sm px-4 py-2 rounded-pill fw-semibold" style="background:linear-gradient(135deg, #E8B8C7 0%, #C8A25A 100%); color:#0B0B0B; border:none; text-decoration:none;">
                Shop Similar Wigs
              </a>
              <a href="https://wa.me/447539593290" target="_blank" rel="noopener" class="btn btn-sm px-3 py-2 rounded-pill text-white border" style="border-color:rgba(255,255,255,0.2) !important; text-decoration:none;">
                <i class="bi bi-whatsapp text-success me-1"></i> Custom Consultation
              </a>
            </div>
          </div>

        </div>

        <!-- 4 Key Selling Points below the showcase -->
        <div class="row g-3 mt-4 text-center">
          <div class="col-6 col-md-3">
            <div class="p-3 rounded-4 glass-panel h-100">
              <i class="bi bi-patch-check-fill fs-3 mb-2 d-inline-block text-gold-gradient"></i>
              <h5 class="fs-6 fw-semibold text-white mb-1">100% Virgin Remy Hair</h5>
              <p class="small mb-0" style="color:rgba(255,255,255,0.78); line-height:1.45;">Silky, tangle-free cuticle aligned human hair that can be styled & colored.</p>
            </div>
          </div>
          <div class="col-6 col-md-3">
            <div class="p-3 rounded-4 glass-panel h-100">
              <i class="bi bi-eye-slash-fill fs-3 mb-2 d-inline-block text-gold-gradient"></i>
              <h5 class="fs-6 fw-semibold text-white mb-1">Invisible HD Lace Melt</h5>
              <p class="small mb-0" style="color:rgba(255,255,255,0.78); line-height:1.45;">Ultra-thin Swiss HD lace melts seamlessly into all skin tones undetectable.</p>
            </div>
          </div>
          <div class="col-6 col-md-3">
            <div class="p-3 rounded-4 glass-panel h-100">
              <i class="bi bi-flower1 fs-3 mb-2 d-inline-block text-gold-gradient"></i>
              <h5 class="fs-6 fw-semibold text-white mb-1">Pre-Plucked Hairline</h5>
              <p class="small mb-0" style="color:rgba(255,255,255,0.78); line-height:1.45;">Graduated density with natural baby hairs ready for immediate wear.</p>
            </div>
          </div>
          <div class="col-6 col-md-3">
            <div class="p-3 rounded-4 glass-panel h-100">
              <i class="bi bi-shield-lock-fill fs-3 mb-2 d-inline-block text-gold-gradient"></i>
              <h5 class="fs-6 fw-semibold text-white mb-1">Glueless & Secure</h5>
              <p class="small mb-0" style="color:rgba(255,255,255,0.78); line-height:1.45;">Wear adhesive-free with custom adjustable elastic bands and combs.</p>
            </div>
          </div>
        </div>

      </div>
    </div>

  </div>
</section>

<section id="testimonials" class="section-padding">
  <div class="container" style="max-width:1320px;">
    <x-section-heading eyebrow="Adored By You">Words from our <span class="text-rose-gradient fst-italic">muses</span></x-section-heading>
    <div class="row g-4">
      @foreach (config('site.testimonials') as $item)
        <x-testimonial-card :item="$item" />
      @endforeach
    </div>
  </div>
</section>

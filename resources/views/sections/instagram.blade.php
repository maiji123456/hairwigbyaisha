<section class="section-padding">
  <div class="container" style="max-width:1320px;">
    <x-section-heading :eyebrow="config('site.handle')" description="A daily dose of hair inspiration, straight from our atelier.">Follow the <span class="text-gold-gradient fst-italic">glow</span></x-section-heading>
    <div class="row g-3">
      @foreach (config('site.instagram') as $image)
        <x-insta-tile :image="$image" />
      @endforeach
    </div>
  </div>
</section>

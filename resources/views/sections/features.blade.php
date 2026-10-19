<section class="section-padding">
  <div class="container" style="max-width:1320px;">
    <x-section-heading eyebrow="Why LuxeHair" description="From raw human hair to our signature styling rituals, every detail is designed for the woman who refuses ordinary.">Where every strand is <span class="text-rose-gradient fst-italic">couture</span></x-section-heading>
    <div class="row g-3">
      @foreach (config('site.features') as $item)
        <x-feature-tile :item="$item" />
      @endforeach
    </div>
  </div>
</section>

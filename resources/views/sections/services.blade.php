<section id="services" class="section-padding">
  <div class="container" style="max-width:1320px;">
    <x-section-heading eyebrow="Salon Services" description="Studio experiences designed and delivered by Aisha's master team.">The <span class="text-rose-gradient fst-italic">Atelier</span> Menu</x-section-heading>
    <div class="row g-4">
      @foreach (config('site.services') as $item)
        <x-service-card :item="$item" />
      @endforeach
    </div>
  </div>
</section>

<section id="shop" class="section-padding">
  <div class="container" style="max-width:1320px;">
    <x-section-heading eyebrow="Shop Categories" description="Six luxury verticals, one obsession — hair that turns heads.">Curated for the <span class="text-gold-gradient fst-italic">connoisseur</span></x-section-heading>
    <div class="categories-grid">
      @foreach (config('site.categories') as $item)
        <x-category-card :item="$item" :featured="$loop->first" />
      @endforeach
    </div>
  </div>
</section>

@php
  $schema = [
    '@context' => 'https://schema.org',
    '@type' => 'HairSalon',
    'name' => config('site.name'),
    'url' => url('/'),
    'description' => config('site.description'),
    'logo' => asset(config('site.logo')),
    'image' => asset(config('site.logo')),
    'telephone' => config('site.phone'),
    'email' => config('site.email'),
    'sameAs' => array_values(config('site.social')),
  ];
@endphp
<script type="application/ld+json">{!! json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_HEX_TAG) !!}</script>

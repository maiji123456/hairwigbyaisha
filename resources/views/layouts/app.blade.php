<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', config('site.title'))</title>
  <meta name="description" content="@yield('description', config('site.description'))">
  <meta name="author" content="{{ config('site.name') }}">
  <link rel="canonical" href="{{ url()->current() }}">

  <meta property="og:type" content="website">
  <meta property="og:site_name" content="{{ config('site.name') }}">
  <meta property="og:url" content="{{ url()->current() }}">
  <meta property="og:title" content="@yield('title', config('site.title'))">
  <meta property="og:description" content="@yield('og_description', config('site.og_description'))">
  <meta property="og:image" content="{{ asset(config('site.logo')) }}">
  <meta property="og:image:alt" content="{{ config('site.name') }} logo">
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:site" content="{{ config('site.handle') }}">
  <meta name="twitter:title" content="@yield('title', config('site.title'))">
  <meta name="twitter:description" content="@yield('og_description', config('site.og_description'))">
  <meta name="twitter:image" content="{{ asset(config('site.logo')) }}">

  <link rel="icon" href="{{ asset('favicon.ico') }}" sizes="any">
  <link rel="icon" href="{{ asset(config('site.logo')) }}" type="image/png">
  <link rel="apple-touch-icon" href="{{ asset(config('site.logo')) }}">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@300;400;500;600;700&family=Great+Vibes&family=Jost:wght@300;400;500;600&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="{{ asset('css/styles.css') }}?v={{ filemtime(public_path('css/styles.css')) }}">
  @include('layouts.partials.structured-data')
  @stack('head')
</head>
<body>

@include('layouts.partials.header')

<main id="main">
@yield('content')
</main>

@include('layouts.partials.footer')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('js/site.js') }}?v={{ filemtime(public_path('js/site.js')) }}"></script>
@stack('scripts')
@include('layouts.partials.tawk')

</body>
</html>

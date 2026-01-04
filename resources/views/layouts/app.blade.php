<!doctype html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title')</title>
  <link rel="icon" type="image/png" href="{{ asset('assets/img/Logo.png') }}">
  <link href="{{ asset('assets/css/output.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('vendor/swiper/swiper-bundle.min.css') }}" />
  
  <!-- Preload local swiper and app swiper script -->
  <link rel="preload" href="{{ asset('vendor/swiper/swiper-bundle.min.js') }}" as="script">
  <link rel="preload" href="{{ asset('assets/js/swiper.js') }}" as="script">
  @stack('head')
</head>

<body>
  @include('includes.navbar')

  <div class="w-full">
    @yield('content')
  </div>

  @include('includes.footer')

  <script src="{{ asset('vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('assets/js/swiper.js') }}"></script>
</body>

</html>
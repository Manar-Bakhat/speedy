<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name')?? 'Speedy' }}</title>

    <!-- Scripts -->

    <link rel="shortcut icon" type="image/png" href="{{asset('images/logo/joblister.png')}}" />
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">

    <!-- Styles -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    @stack('css')

</head>
<body>
    <div id="app">
       @yield('layout-holder')
    </div>
    @include('sweetalert::alert')
    <script src="{{ asset('js/app.js') }}"></script>
    @stack('js')


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

      <!-- ===== Link Swiper's CSS ===== -->
      <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"/>

      <!-- ===== Fontawesome CDN Link ===== -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"/>
      <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
     <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">

          <!-- JavaScript Libraries -->
     <!-- JavaScript Libraries -->
       <!------
     <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
     <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
     <script src="lib/typed/typed.min.js"></script>
     <script src="lib/easing/easing.min.js"></script>
     <script src="lib/waypoints/waypoints.min.js"></script>
     <script src="lib/owlcarousel/owl.carousel.min.js"></script>
     <script src="lib/isotope/isotope.pkgd.min.js"></script>
     <script src="lib/lightbox/js/lightbox.min.js"></script>

     <!-- Contact Javascript File
     <script src="mail/jqBootstrapValidation.min.js"></script>
     <script src="mail/contact.js"></script>
-->


    </body>
</html>

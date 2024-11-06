<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite(['resources/css/app.css','resources/css/animate.css', 'resources/css/tailwind.css', 'resources/css/animate.css','resources/js/app.js','resources/js/main.js','resources/js/swiper-bundle.min.js','resources/js/wow.min.js'])
   <!-- ==== WOW JS ==== -->
   {{-- <script>
    new WOW().init();
   </script> --}}
</head>
<body>

  <div id="app">
    <home-page/>
  </div>
</body>
</html>
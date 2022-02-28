<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    @include('landing-page.layout-komponen.css-eksternal')
    <title>@yield('title')</title>
    @yield('css-internal')
    
    <script src="https://kit.fontawesome.com/34f8c2075a.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('assets/fontawesome/css/all.css') }}">
  </head>
  <body>
    @include('landing-page.layout-komponen.navbar')
    @include('landing-page.layout-komponen.layout-konten')
    @include('landing-page.layout-komponen.footer')
    @include('landing-page.layout-komponen.js-eksternal')
    @yield('js-internal')
  </body>
</html>
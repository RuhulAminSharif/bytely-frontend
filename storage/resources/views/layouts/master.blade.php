<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name', 'Laravel') }}</title>
    @vite('resources/css/app.css', 'resources/js/app.js')
  </head>
  <body class="max-w-[1440px] mx-auto bg-[var(--primary-background)] text-[var(--primary-text)]] line-height-[1.6] font-[Inter, sans-serif]">

    <!--=============================
        TOPBAR START
    ==============================-->
    @include('layouts.topbar')
    <!--=============================
        TOPBAR END
    ==============================-->

    <main class="mt-20">
        @yield('content')
    </main>

    <!--=============================
        FOOTER START
    ==============================-->
    @include('layouts.footer')
    <!--=============================
        FOOTER END
    ==============================-->



</body>

</html>

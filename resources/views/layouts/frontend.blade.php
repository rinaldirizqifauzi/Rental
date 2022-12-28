

<!--
=========================================================
 Paper Kit 2 - v2.2.0
=========================================================

 Product Page: https://www.creative-tim.com/product/paper-kit-2
 Copyright 2019 Creative Tim (https://www.creative-tim.com)
 Licensed under MIT (https://github.com/creativetimofficial/paper-kit-2/blob/master/LICENSE.md)

 Coded by Creative Tim

=========================================================

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. -->

<!DOCTYPE html>

<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('frontend') }}/assets/img//apple-icon.png">
  <link rel="icon" type="image/png" href="{{ asset('frontend') }}/assets/img//favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    {{ config('app.name') }} | @yield('title')
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <!-- CSS Files -->
  <link href="{{ asset('frontend') }}/assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="{{ asset('frontend') }}/assets/css/paper-kit.css?v=2.2.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="{{ asset('frontend') }}/assets/demo/demo.css" rel="stylesheet" />
    {{-- css:external --}}
    @stack('css-external')
    {{-- css:internal --}}
    @stack('css-internal')

</head>

<body class="landing-page sidebar-collapse">
    {{-- Navbar --}}
        @yield('carousel')
    {{-- End Navbar --}}

    {{-- Navbar --}}
        @yield('navbar')
    {{-- End Navbar --}}

    {{-- Page-Header --}}
        @yield('page-header')
    {{-- End Page-Header --}}

    {{-- Main --}}
        @yield('main')
    {{-- End Main --}}

    {{-- Footer --}}
        @yield('footer')
    {{-- End Footer --}}

  <!--   Core JS Files   -->
  <script src="{{ asset('frontend') }}/assets/js/core/jquery.min.js" type="text/javascript"></script>
  <script src="{{ asset('frontend') }}/assets/js/core/popper.min.js" type="text/javascript"></script>
  <script src="{{ asset('frontend') }}/assets/js/core/bootstrap.min.js" type="text/javascript"></script>
  <!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
  <script src="{{ asset('frontend') }}/assets/js/plugins/bootstrap-switch.js"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="{{ asset('frontend') }}/assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
  <!--  Plugin for the DatePicker, full documentation here: https://github.com/uxsolutions/bootstrap-datepicker -->
  <script src="{{ asset('frontend') }}/assets/js/plugins/moment.min.js"></script>
  <script src="{{ asset('frontend') }}/assets/js/plugins/bootstrap-datepicker.js" type="text/javascript"></script>
  <!-- Control Center for Paper Kit: parallax effects, scripts for the example pages etc -->
  <script src="{{ asset('frontend') }}/assets/js/paper-kit.js?v=2.2.0" type="text/javascript"></script>
  <!--  Google Maps Plugin    -->
  <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

    {{-- javascript:external --}}
    @stack('javascript-external')
    {{-- javascript:internal --}}
    @stack('javascript-internal')
</body>

</html>

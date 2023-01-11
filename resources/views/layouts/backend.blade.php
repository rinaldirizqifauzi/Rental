<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('backend') }}/assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="{{ asset('backend') }}/assets/img/favicon.png">
  <title>
    {{ config('app.name') }} | @yield('title')
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="{{ asset('backend') }}/assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="{{ asset('backend') }}/assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="{{ asset('backend') }}/assets/css/nucleo-svg.css" rel="stylesheet" />
  {{-- Bootstrap --}}
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">


  <!-- CSS Files -->
  <link id="pagestyle" href="{{ asset('backend') }}/assets/css/argon-dashboard.css?v=2.0.4" rel="stylesheet" />

    {{-- css:external --}}
    @stack('css-external')
    {{-- css:internal --}}
    @stack('css-internal')

  {{-- Body Menu --}}
  <link rel="stylesheet" href="{{ asset('style/body.menu.css') }}">

  <style>
      .docs-info{
        width: 100%;
        padding: 10px;
        overflow: scroll;
        height: 485px;
    }
  </style>
      @vite('resources/css/app.css')
</head>

<body class="g-sidenav-show   bg-gray-100">
  <div class="min-height-300 bg-primary position-absolute w-100"></div>
  <aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/argon-dashboard/pages/dashboard.html " target="_blank">
        <img src="{{ asset('backend') }}/assets/img/logo-ct-dark.png" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold">{{ config('app.name') }}</span>
      </a>
    </div>
    <hr class="horizontal dark mt-0">
    @include('components.backend.sidebar')
    <div class="sidenav-footer mx-3 mb-4">
      <div class="card card-plain shadow-none" id="sidenavCard">
        <img class="w-50 mx-auto" src="{{ asset('backend') }}/assets/img/illustrations/icon-documentation.svg" alt="sidebar_illustration">
        <div class="card-body text-center p-3 w-100 pt-0">
            <h6 class="mb-0">Need help?</h6>
            <p class="text-xs font-weight-bold mb-0">Please check our docs</p>
        </div>
      </div>
    </div>
  </aside>
  <main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
    @include('components.backend.navbar')
    {{-- Sidebar --}}
    <div class="container-fluid py-4">
        @include('components.backend.menu-dashboard.content')
        @yield('menu_laporan')
        @yield('card-content')
    </div>
    <!-- End Sidebar -->
  </main>

  <!--   Core JS Files   -->
  <script src="{{ asset('backend') }}/assets/js/core/popper.min.js"></script>
  <script src="{{ asset('backend') }}/assets/js/core/bootstrap.min.js"></script>
  <script src="{{ asset('backend') }}/assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="{{ asset('backend') }}/assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="{{ asset('backend') }}/assets/js/plugins/chartjs.min.js"></script>

  <script src="{{ asset('backend') }}/assets/js/argon-dashboard.min.js?v=2.0.4"></script>

  {{-- Jquery --}}
  <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <!-- IonIcons -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>


    {{-- javascript:external --}}
    @stack('javascript-external')
    {{-- javascript:internal --}}
    @stack('java
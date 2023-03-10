<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
    <div class="container-fluid py-1 px-3">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
          <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Pages</a></li>
          <li class="breadcrumb-item text-sm text-white active" aria-current="page">Dashboard</li>
        </ol>
        <h6 class="font-weight-bolder text-white mb-0">@yield('title-page')</h6>
      </nav>
      <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
        <div class="ms-md-auto pe-md-3 d-flex align-items-center">
          <div class="input-group">
            <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
            <input type="text" class="form-control" placeholder="Type here...">
          </div>
        </div>
        <ul class="navbar-nav  justify-content-end">
          <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
            <a href="javascript:;" class="nav-link text-white p-0" id="iconNavbarSidenav">
              <div class="sidenav-toggler-inner">
                <i class="sidenav-toggler-line bg-white"></i>
                <i class="sidenav-toggler-line bg-white"></i>
                <i class="sidenav-toggler-line bg-white"></i>
              </div>
            </a>
          </li>

          <li class="nav-item dropdown pe-2 d-flex align-items-center">
            <a href="javascript:;" class="nav-link text-white p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa fa-user me-sm-1"></i>
            </a>
            @if(Auth::user()->status_user == null)
            <a href="{{ route('admin.create_profil', Auth::user()->username) }}"class="nav-link text-white" id="iconNavbarSidenav">
                | <span class="nav-link-text ms-1" style="color: white">Buat Profil </span>
            </a>
            @elseif(Auth::user()->status_user == 'active')
            <a href="{{ route('admin.show_profil', Auth::user()->username) }}"class="nav-link text-white" id="iconNavbarSidenav">
                | <span class="nav-link-text ms-1" style="color: white">Profil </span>
            </a>
            @endif
            <span class="nav-link-text ms-1" style="color: white">Wellcome, {{ auth()->user()->username }}</span>
            <a class="nav-link-text text-white" href="{{ route('logout') }}"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                | <span class="nav-link-text ms-1" style="color: white">Log Out </span>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
            <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
                <li class="mb-2">
                    <a href="{{ route('beranda') }}" class="dropdown-item border-radius-md">
                        <div class="d-flex py-1">
                            <div class="d-flex flex-column justify-content-center">
                                <p>Halaman Website</p>
                            </div>
                        </div>
                    </a>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>

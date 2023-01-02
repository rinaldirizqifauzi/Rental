  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg fixed-top navbar-transparent " color-on-scroll="300">
    <div class="container">
      <div class="navbar-translate">
        <a class="navbar-brand" href="https://demos.creative-tim.com/paper-kit/index.html" rel="tooltip" title="Coded by Creative Tim" data-placement="bottom" target="_blank">
            {{ config('app.name') }}
        </a>
        <button class="navbar-toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-bar bar1"></span>
          <span class="navbar-toggler-bar bar2"></span>
          <span class="navbar-toggler-bar bar3"></span>
        </button>
      </div>
      <div class="collapse navbar-collapse justify-content-end" id="navigation">
        <ul class="navbar-nav">

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav me-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto">
                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                    <div class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" id="dropdownMenuButton" role="button" aria-haspopup="true" aria-expanded="false">{{ auth()->user()->username }}</a>
                        <ul class="dropdown-menu dropdown-info" aria-labelledby="dropdownMenuButton">
                            @if (auth()->user()->level == 'admin')
                            <li class="nav-item">
                                <a href="{{ route('dashboard.index') }}" class="dropdown-item">
                                    Dashboard
                                </a>
                                @elseif(auth()->user()->status_user == 'active')
                                <a href="{{ route('show.profil', Auth::user()->email) }}" class="dropdown-item">
                                    Profil
                                 </a>
                            </li>
                            @endif
                            @if(Auth::user()->status_user == 'user')
                            <li class="nav-item">
                                <a href="{{ route('create.profil', Auth::user()->email) }}" class="dropdown-item">
                                    Buat Profil
                                </a>
                            </li>
                            @endif
                            <li class="nav-item">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                                </a>
                            </li>

                        </ul>
                      </div>
                    @endguest
                </ul>
            </div>
            {{-- @auth
            <div class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" id="dropdownMenuButton" href="#pk" role="button" aria-haspopup="true" aria-expanded="false">Dropdown</a>
                <ul class="dropdown-menu dropdown-info" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" href="#pk">Action</a>
                  <a class="dropdown-item" href="#pk">Another action</a>
                  <a class="dropdown-item" href="#pk">Something else here</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#pk">Separated link</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#pk">Another separated link</a>
                </ul>
              </div>
            @else
            <li class="nav-item">
              <a href="{{ route('login') }}"  class="nav-link"><i class="nc-icon nc-book-bookmark"></i> Login</a>
            </li>
            @endauth --}}
          <li class="nav-item">
            <a  href="{{ route('beranda') }}" class="nav-link" rel="tooltip" title="Follow us on Twitter" data-placement="bottom">
                Beranda
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" rel="tooltip" title="Like us on Facebook" data-placement="bottom" href="https://www.facebook.com/CreativeTim" target="_blank">
              <i class="fa fa-facebook-square"></i>
              <p class="d-lg-none">Facebook</p>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" rel="tooltip" title="Follow us on Instagram" data-placement="bottom" href="https://www.instagram.com/CreativeTimOfficial" target="_blank">
              <i class="fa fa-instagram"></i>
              <p class="d-lg-none">Instagram</p>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" rel="tooltip" title="Star on GitHub" data-placement="bottom" href="https://www.github.com/CreativeTimOfficial" target="_blank">
              <i class="fa fa-github"></i>
              <p class="d-lg-none">GitHub</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- End Navbar -->

<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <div class="row">
            <div class="col-2">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="https://logowik.com/content/uploads/images/western-digital-wd4852.jpg" alt="logo-navbar"
                        class="img-fluid">
                </a>

            </div>
            <div class="col-10">

                <ul class="navbar-nav" style="margin: 38px 0;">
                    <li class="nav-item">
                        <a class="nav-link @if (request()->routeIs('admin.home')) active @endif"
                            href="{{ url('/') }}">{{ __('Home') }}</a>
                    </li>

                    @guest
                        <li class="nav-item">
                            <a href="#" class="nav-link">Scopri di più</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a href="#" class="nav-link">Scopri di più</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.types.index') }}"
                                class="nav-link @if (request()->routeIs('admin.types*')) active @endif">Tipi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if (request()->routeIs('admin.projects*')) active @endif"
                                href="{{ route('admin.projects.index') }}">Projects</a>
                        </li>

                    @endguest
                </ul>
            </div>
        </div>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ url('admin') }}">Home</a>
                            <a class="dropdown-item" href="{{ url('profile') }}">{{ __('Profile') }}</a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>

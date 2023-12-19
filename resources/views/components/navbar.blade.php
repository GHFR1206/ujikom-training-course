<nav class="background-header">
    <div style="top: 0; left: 0;">
        <a href="{{ route('index') }}"><img src="{{ asset('images/smart-logo.jpg') }}" style="width: 90px"></a>
    </div>
    <div class="p-5">
        <div class="p-4"></div>
    </div>
    </div>
</nav>

<nav class="navbar-expand-sm navbar-dark bg-dark shadow-sm">

    <div class="container p-1">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav me-auto">

                <a class="text-decoration-none text-center align-middle text-white"
                    href="https://api.whatsapp.com/send?phone=6289513117552" target="_blank"><i
                        class="text-white fab fa-whatsapp mr-1" aria-hidden="true"></i> SMART Admin</a>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto">
                @auth
                    @if (Auth::user()->role == 0)
                        <li class="nav-item mr-3">
                            <a href="{{ route('course.create') }}"
                                class="nav-link @if (request()->routeIs('course.create')) active @endif">Create Course</a>
                        </li>
                    @endif
                @endauth
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item mr-3">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif
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

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('usercourse.index') }}">
                                Registered Course
                            </a>
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

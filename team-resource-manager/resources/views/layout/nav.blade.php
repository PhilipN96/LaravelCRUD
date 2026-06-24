<nav class="navbar navbar-expand-lg navbar-dark app-navbar py-3">
    <div class="container-fluid px-4">
        <a class="navbar-brand d-flex align-items-center gap-3" href="{{ route('resources.index') }}">
            <img src="{{ asset('images/buch.png') }}"
                 width="60"
                 height="60"
                 alt="Logo"
                 class="brand-logo">
            <div>
                <div class="fw-bold fs-5">{{ config('app.name', 'Digitales Berichtsheft') }}</div>
                <div class="small text-white-50">Laravel-Projekt für das digitale Berichtsheft</div>
            </div>
        </a>

        <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse mt-3 mt-lg-0" id="mainNavbar">
            <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-2">
                @guest
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('login') ? 'active fw-semibold' : '' }}" href="{{ route('login') }}">
                            Anmelden
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-light text-primary fw-semibold px-3" href="{{ route('register') }}">
                            Registrieren
                        </a>
                    </li>
                @else
                    <li class="nav-item">
                        <span class="nav-link text-white-50">
                            <i class="bi bi-person-circle me-1"></i>{{ Auth::user()->name }}
                            @if(Auth::user()->isAdmin())
                                <span class="badge rounded-pill bg-primary ms-1">Admin</span>
                            @endif
                        </span>
                    </li>

                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST" class="m-0">
                            @csrf
                            <button type="submit" class="btn btn-outline-light btn-sm px-3">
                                <i class="bi bi-box-arrow-right me-1"></i>Logout
                            </button>
                        </form>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
<div class="sidebar-card">
    @auth
        <div class="welcome-box mb-4">
            <div class="fw-semibold fs-5 mb-1">Hallo, {{ Auth::user()->name }} 👋</div>
            <div class="small text-white-50">Willkommen in Deinem digitalen Berichtsheft.</div>
        </div>
    @else
        <div class="welcome-box mb-4">
            <div class="fw-semibold fs-5 mb-1">Digitales Berichtsheft</div>
            <div class="small text-white-50">Bitte melde Dich an oder registriere Dich.</div>
        </div>
    @endauth

    <div class="sidebar-title">Navigation</div>

    <div class="d-flex flex-column gap-2">
        <a href="{{ route('resources.index') }}"
           class="sidebar-link {{ Route::is('resources.index') ? 'active' : '' }}">
            <i class="bi bi-grid-1x2-fill"></i>
            <span>Ressourcen</span>
        </a>

        <a href="{{ route('report-entries.index') }}"
            class="sidebar-link {{ Route::is('report-entries.*') ? 'active' : '' }}">
            <i class="bi bi-journal-text"></i>
    <span>Berichtsheft</span>
        </a>

        <a href="{{ route('resources.create') }}"
           class="sidebar-link {{ Route::is('resources.create') ? 'active' : '' }}">
            <i class="bi bi-plus-circle-fill"></i>
            <span>Neue Ressource</span>
        </a>

        @guest
            <a href="{{ route('login') }}"
               class="sidebar-link {{ Route::is('login') ? 'active' : '' }}">
                <i class="bi bi-box-arrow-in-right"></i>
                <span>Anmelden</span>
            </a>

            <a href="{{ route('register') }}"
               class="sidebar-link {{ Route::is('register') ? 'active' : '' }}">
                <i class="bi bi-person-plus-fill"></i>
                <span>Registrieren</span>
            </a>
        @endguest
    </div>

    @auth
        <hr class="my-4">

        <div class="sidebar-title">Benutzer</div>
        <div class="small text-muted">
            <div class="fw-semibold text-dark">{{ Auth::user()->name }}</div>
            <div>{{ Auth::user()->email }}</div>
        </div>
    @endauth
</div>
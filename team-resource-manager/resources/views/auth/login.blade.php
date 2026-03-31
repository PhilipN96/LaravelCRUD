@extends('layout.layout')

@section('content')
    <div class="auth-card">
        <div class="page-header text-center">
            <h2 class="page-title">Anmelden</h2>
            <p class="page-subtitle">Melde Dich mit Deinem Benutzerkonto an.</p>
        </div>

        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0 ps-3">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('login') }}" method="POST" class="mt-4">
            @csrf

            <div class="mb-3">
                <label for="email" class="form-label fw-semibold">E-Mail</label>
                <input type="email"
                       id="email"
                       name="email"
                       value="{{ old('email') }}"
                       class="form-control"
                       required
                       autofocus>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label fw-semibold">Passwort</label>
                <input type="password"
                       id="password"
                       name="password"
                       class="form-control"
                       required>
            </div>

            <div class="form-check mb-4">
                <input class="form-check-input" type="checkbox" name="remember" id="remember">
                <label class="form-check-label" for="remember">
                    Angemeldet bleiben
                </label>
            </div>

            <div class="d-grid mb-3">
                <button type="submit" class="btn btn-primary btn-lg">
                    Einloggen
                </button>
            </div>

            <div class="text-center">
                <a href="{{ route('register') }}" class="text-decoration-none">
                    Noch kein Konto? Jetzt registrieren
                </a>
            </div>
        </form>
    </div>
@endsection
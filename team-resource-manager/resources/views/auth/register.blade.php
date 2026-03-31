@extends('layout.layout')

@section('content')
    <div class="auth-card">
        <div class="page-header text-center">
            <h2 class="page-title">Registrieren</h2>
            <p class="page-subtitle">Erstelle ein neues Benutzerkonto.</p>
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

        <form action="{{ route('register') }}" method="POST" class="mt-4">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label fw-semibold">Name</label>
                <input type="text"
                       id="name"
                       name="name"
                       value="{{ old('name') }}"
                       class="form-control"
                       required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label fw-semibold">E-Mail</label>
                <input type="email"
                       id="email"
                       name="email"
                       value="{{ old('email') }}"
                       class="form-control"
                       required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label fw-semibold">Passwort</label>
                <input type="password"
                       id="password"
                       name="password"
                       class="form-control"
                       required>
            </div>

            <div class="mb-4">
                <label for="password_confirmation" class="form-label fw-semibold">Passwort bestätigen</label>
                <input type="password"
                       id="password_confirmation"
                       name="password_confirmation"
                       class="form-control"
                       required>
            </div>

            <div class="d-grid mb-3">
                <button type="submit" class="btn btn-primary btn-lg">
                    Registrieren
                </button>
            </div>

            <div class="text-center">
                <a href="{{ route('login') }}" class="text-decoration-none">
                    Bereits ein Konto? Zum Login
                </a>
            </div>
        </form>
    </div>
@endsection
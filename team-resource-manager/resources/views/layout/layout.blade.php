<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Digitales Berichtsheft') }}</title>

    <link rel="icon" href="{{ asset('favicon.png') }}" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #eef2f7 0%, #f8fafc 100%);
            color: #1e293b;
        }

        .app-navbar {
            background: linear-gradient(90deg, #0f172a 0%, #1e293b 100%);
            box-shadow: 0 6px 24px rgba(15, 23, 42, 0.12);
        }

        .app-shell {
            padding-top: 2rem;
            padding-bottom: 2rem;
        }

        .sidebar-card,
        .content-card,
        .auth-card,
        .dashboard-card {
            background: rgba(255, 255, 255, 0.96);
            border: 1px solid rgba(226, 232, 240, 0.9);
            border-radius: 1.25rem;
            box-shadow: 0 12px 35px rgba(15, 23, 42, 0.08);
        }

        .content-card {
            padding: 2rem;
            min-height: 78vh;
        }

        .sidebar-card {
            padding: 1.25rem;
            position: sticky;
            top: 1.5rem;
        }

        .brand-logo {
            object-fit: contain;
            background: #fff;
            border-radius: 0.85rem;
            padding: 0.25rem;
        }

        .sidebar-link {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.85rem 1rem;
            border-radius: 0.95rem;
            text-decoration: none;
            color: #334155;
            font-weight: 500;
            transition: all 0.18s ease;
        }

        .sidebar-link:hover {
            background: #eff6ff;
            color: #0d6efd;
        }

        .sidebar-link.active {
            background: linear-gradient(90deg, #dbeafe 0%, #eff6ff 100%);
            color: #0d6efd;
            font-weight: 600;
        }

        .sidebar-title {
            color: #94a3b8;
            font-size: 0.78rem;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            margin-bottom: 0.75rem;
        }

        .welcome-box {
            background: linear-gradient(135deg, #2563eb 0%, #3b82f6 100%);
            color: #fff;
            border-radius: 1rem;
            padding: 1rem;
        }

        .page-header {
            margin-bottom: 1.5rem;
        }

        .page-title {
            font-weight: 700;
            margin-bottom: 0.25rem;
            color: #0f172a;
        }

        .page-subtitle {
            color: #64748b;
            margin-bottom: 0;
        }

        .auth-card {
            width: 100%;
            max-width: 520px;
            padding: 2rem;
            margin: 0 auto;
        }

        @media (max-width: 991.98px) {
            .sidebar-card {
                position: static;
            }

            .content-card {
                min-height: auto;
                padding: 1.25rem;
            }
        }
    </style>
</head>
<body>
    @include('layout.nav')

    <div class="container-fluid app-shell">
        <div class="row g-4">
            <div class="col-12 col-lg-3 col-xl-2">
                @include('layout.sidebar')
            </div>

            <div class="col-12 col-lg-9 col-xl-10">
                @guest
                    <div class="auth-card">
                        @yield('content')
                    </div>
                @else
                    <main class="content-card">
                        @yield('content')
                    </main>
                @endguest
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
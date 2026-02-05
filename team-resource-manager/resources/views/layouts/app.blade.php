{{-- resources/views/layouts/app.blade.php --}}
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Team Resource Manager</title>

    {{-- Variante ohne Vite: Tailwind über CDN --}}
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- Wenn du später Vite nutzen willst, dann:
         1. npm install
         2. npm run dev
         3. Obige Script-Zeile löschen und stattdessen das hier aktivieren:

         @vite(['resources/css/app.css', 'resources/js/app.js'])
    --}}
</head>
<body class="bg-gray-100">
    <header class="bg-white shadow p-4 mb-4">
        <a href="{{ url('/') }}" class="text-xl font-bold hover:underline">
            Team Resource Manager
        </a>
    </header>

    <div class="flex">
        <aside class="w-64 bg-white shadow p-4 min-h-screen">
            <ul class="space-y-2">
                <li>
                    <a href="{{ url('/') }}" class="hover:underline">
                        Dashboard
                    </a>
                </li>
                <li>
                    <a href="{{ route('resources.index') }}" class="hover:underline">
                        Ressourcen
                    </a>
                </li>
                <li>
                    <a href="#" class="hover:underline">
                        Anfragen
                    </a>
                </li>
            </ul>
        </aside>

        <main class="flex-1 p-6">
            @yield('content')
        </main>
    </div>
</body>
</html>

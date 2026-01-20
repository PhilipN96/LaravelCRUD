{{-- resources/views/layouts/app.blade.php --}}
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Team Resource Manager</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
    <header class="bg-white shadow p-4 mb-4">
        <h1 class="text-xl font-bold">Team Resource Manager</h1>
    </header>

    <div class="flex">
        <aside class="w-64 bg-white shadow p-4 min-h-screen">
            <ul class="space-y-2">
                <li><a href="/" class="hover:underline">Dashboard</a></li>
                <li><a href="#" class="hover:underline">Ressourcen</a></li>
                <li><a href="#" class="hover:underline">Anfragen</a></li>
            </ul>
        </aside>

        <main class="flex-1 p-6">
            @yield('content')
        </main>
    </div>
</body>
</html>

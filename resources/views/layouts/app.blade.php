<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>ResepKita</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-orange-50 min-h-screen">

    <nav class="bg-orange-800 text-white p-4 mb-8">
        <div class="max-w-7xl mx-auto flex justify-between">
            <a href="{{ Auth::check() ? route('dashboard') : route('recipes.index') }}" class="text-2xl font-bold">
                Resep<span class="text-orange-300">Kita</span>
            </a>
            <div class="flex gap-4 items-center">
                @auth
                    <a href="{{ route('dashboard') }}" class="font-semibold hover:text-orange-200">Dashboard</a>
                    <a href="{{ route('recipes.index') }}" class="font-semibold hover:text-orange-200">Katalog</a>
                    <a href="{{ route('favorites.index') }}">♥ Favorit</a>
                    <a href="{{ route('recipes.create') }}" class="bg-orange-500 px-3 py-1 rounded font-bold">
                        + Resep
                    </a>
                    <a href="{{ route('profile.index') }}" class="font-semibold hover:text-orange-200">Profil</a>
                @else
                    <a href="{{ route('login') }}">Masuk</a>
                    <a href="{{ route('register') }}" class="bg-white text-orange-800 px-3 py-1 rounded">
                        Daftar
                    </a>
                @endauth
            </div>
        </div>
    </nav>

    <main class="max-w-7xl mx-auto px-4">
        @if(session('success'))
            <div class="bg-orange-100 border-l-4 border-orange-500 text-orange-800 p-4 mb-6 rounded">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </main>

</body>

</html>
<!-- resources/views/layouts/app.blade.php -->
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-gray-100">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'MedTrack')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
</head>
<body class="h-full">
<div class="min-h-full">
    <!-- Top bar with brand + simple links -->
    <nav class="bg-indigo-600">
        <div class="mx-auto max-w-7xl h-16 flex items-center justify-between px-4 sm:px-6 lg:px-8">

            <!-- Brand -->
            <a href="/dashboard" class="flex items-center gap-2 text-white font-semibold">
                <img class="h-8 w-8" src="{{ asset('MedTrackIcon.png') }}" alt="MedTrack logo">
                <span>MedTrack</span>
            </a>

            <!-- Proste linki -->
            <div class="flex space-x-3 text-sm font-medium">
                <a href="/"            class="px-3 py-2 rounded-md text-white/90 hover:bg-white/20">Strona&nbsp;główna</a>
                <a href="/patients"    class="px-3 py-2 rounded-md text-white/90 hover:bg-white/20">Pacjenci</a>
                <a href="/appointments"class="px-3 py-2 rounded-md text-white/90 hover:bg-white/20">Wizyty</a>
                <a href="/calendar"    class="px-3 py-2 rounded-md text-white/90 hover:bg-white/20">Kalendarz</a>
            </div>

            <!-- Przyciski auth -->
            <div class="flex items-center space-x-3 text-sm font-medium">
                @auth
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                class="px-3 py-2 rounded-md border border-white/60 text-white hover:bg-white/10">
                            Wyloguj&nbsp;się
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}"
                       class="px-3 py-2 rounded-md bg-white text-indigo-600 hover:bg-indigo-50">
                        Zaloguj&nbsp;się
                    </a>
                    <a href="{{ route('register') }}"
                       class="px-3 py-2 rounded-md border border-white/60 text-white hover:bg-white/10">
                        Zarejestruj&nbsp;się
                    </a>
                @endauth
            </div>

        </div>
    </nav>


    <!-- Page heading slot -->
    <header class="bg-white shadow">
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold tracking-tight text-gray-900">@yield('pageHeading')</h1>
        </div>
    </header>

    <!-- Main content -->
    <main>
        <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
            {{ $slot }}
        </div>
    </main>
</div>
</body>
</html>

<x-layout>
    <section class="relative overflow-hidden rounded-lg bg-indigo-600 text-white mb-12">
    <div class="absolute inset-0 opacity-20" style="background-image:url('https://images.unsplash.com/photo-1526256262350-7da7584cf5eb?auto=format&fit=crop&w=1200&q=60'); background-size:cover;"></div>
    <div class="relative px-6 py-24 sm:px-12 lg:px-24 text-center space-y-6">
        <h1 class="text-4xl sm:text-5xl font-extrabold tracking-tight">Cyfrowa przyszłość Twojej przychodni</h1>
        <p class="max-w-2xl mx-auto text-lg sm:text-xl opacity-90">
            Zarządzaj pacjentami, wizytami i dokumentacją medyczną w jednym miejscu – szybko, bezpiecznie, 24/7.
        </p>
        @guest
            <div class="flex flex-col sm:flex-row justify-center gap-4 pt-4">
                <a href="{{ route('login') }}" class="inline-flex items-center justify-center px-8 py-3 text-sm font-semibold bg-white text-indigo-600 rounded-md shadow hover:bg-indigo-50">Zaloguj się</a>
                <a href="{{ route('register') }}" class="inline-flex items-center justify-center px-8 py-3 text-sm font-semibold bg-indigo-500 hover:bg-indigo-400 rounded-md">Zarejestruj się</a>
            </div>
        @endguest
    </div>
    </section>

    <!-- About -->
    <section class="grid gap-12 lg:grid-cols-3 items-start">
        <div class="lg:col-span-1">
            <h2 class="text-2xl font-bold text-gray-800 mb-4">Dlaczego MedTrack?</h2>
            <p class="text-gray-600 leading-relaxed">
                MedTrack to nowoczesny system stworzony z myślą o małych i średnich placówkach medycznych. Ułatwia rejestrację pacjentów, prowadzenie kartoteki oraz generowanie e‑recept.
            </p>
        </div>
        <div class="lg:col-span-2 grid gap-6 sm:grid-cols-2">
            @php
                $features = [
                    ['icon' => 'document', 'title' => 'Dokumentacja online', 'text' => 'Szyfrowane karty pacjentów dostępne w każdym momencie.'],
                    ['icon' => 'clock', 'title' => 'Rejestracja 24/7', 'text' => 'Pacjent umówi wizytę o dowolnej porze, także z telefonu.'],
                    ['icon' => 'shield', 'title' => 'Bezpieczeństwo', 'text' => 'Spełniamy wymogi RODO i szyfrujemy dane wrażliwe.'],
                    ['icon' => 'users', 'title' => 'Zespół specjalistów', 'text' => 'Lekarze rodzinni, pediatrzy, diagności – wszystko w jednym miejscu.'],
                ];
            @endphp
            @foreach($features as $f)
                <div class="bg-white p-6 rounded-lg shadow flex gap-4">
                    <div class="shrink-0">
                        @switch($f['icon'])
                            @case('document')
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-indigo-600" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2a2 2 0 00-2 2v4H8l4 4 4-4h-2V4a2 2 0 00-2-2z"/><path d="M6 8v12a2 2 0 002 2h8a2 2 0 002-2V8H6z"/></svg>
                                @break
                            @case('clock')
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-indigo-600" viewBox="0 0 24 24" fill="currentColor"><path fill-rule="evenodd" d="M12 2a10 10 0 100 20 10 10 0 000-20zm.75 5a.75.75 0 00-1.5 0v5.25c0 .414.336.75.75.75h4.5a.75.75 0 000-1.5h-4.5V7z" clip-rule="evenodd"/></svg>
                                @break
                            @case('shield')
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-indigo-600" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2l7 4v6c0 5.25-3.44 9.74-8 11a11.99 11.99 0 01-8-11V6l9-4z"/></svg>
                                @break
                            @default
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-indigo-600" viewBox="0 0 24 24" fill="currentColor"><path d="M17 20a5 5 0 00-10 0h10zM12 2a5 5 0 00-5 5v1a5 5 0 005 5 5 5 0 005-5V7a5 5 0 00-5-5z"/></svg>
                        @endswitch
                    </div>
                    <div>
                        <h3 class="font-semibold text-gray-800">{{ $f['title'] }}</h3>
                        <p class="text-sm text-gray-600">{{ $f['text'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
</x-layout>

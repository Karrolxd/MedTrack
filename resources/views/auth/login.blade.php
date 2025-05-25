<x-layout>
    <div class="mx-auto max-w-lg space-y-6 bg-white p-8 rounded-lg shadow">

        <div class="text-center mb-4">
            <img class="mx-auto h-12 w-12" src="{{ asset('MedTrackIcon.png') }}" alt="MedTrack logo" />
            <h1 class="mt-2 text-2xl font-semibold text-gray-800">MedTrack</h1>
            <p class="text-sm text-gray-500">Panel przychodni</p>
        </div>

        <x-forms.form method="POST" action="{{ route('login') }}">
            @csrf

            <x-forms.input label="E-mail" name="email" type="email" />
            <x-forms.input label="Hasło" name="password" type="password" />

            <div class="flex justify-between items-center text-sm">
                <x-forms.checkbox name="remember" label="Zapamiętaj mnie" />
                <a href="#" class="text-indigo-600 hover:underline">Zapomniałeś hasła?</a>
            </div>

            <div class="pt-2">
                <x-forms.button class="w-full justify-center">Zaloguj się</x-forms.button>
            </div>
        </x-forms.form>

        <p class="text-center text-sm text-gray-500 pt-2">
            Nie masz konta?
            <a href="{{ route('register') }}" class="text-indigo-600 hover:underline">Zarejestruj się</a>
        </p>

        <p class="text-center text-xs text-gray-400">© {{ now()->year }} MedTrack</p>
    </div>
</x-layout>

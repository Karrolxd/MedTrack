<x-layout>
    <div class="mx-auto max-w-lg space-y-6 bg-white p-8 rounded-lg shadow">

        <div class="text-center mb-4">
            <img class="mx-auto h-12 w-12" src="{{ asset('MedTrackIcon.png') }}" alt="MedTrack logo"/>
            <h1 class="mt-2 text-2xl font-semibold text-gray-800">Dołącz do MedTrack</h1>
        </div>

        <x-forms.form method="POST" action="{{ route('register') }}">
            @csrf

            <x-forms.input label="E-mail" name="email" type="email"/>
            <x-forms.input label="Hasło" name="password" type="password"/>
            <x-forms.input label="Potwierdź Hasło" name="password_confirmation" type="password"/>

            <div class="pt-2">
                <x-forms.button class="w-full justify-center">Zarejestruj się</x-forms.button>
            </div>
        </x-forms.form>

        <p class="text-center text-sm text-gray-500 pt-2">
            Masz już konto?
            <a href="{{ route('login') }}" class="text-indigo-600 hover:underline">Zaloguj się</a>
        </p>

    </div>
</x-layout>

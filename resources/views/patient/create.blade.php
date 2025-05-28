<x-layout>
    <div class="mx-auto max-w-lg space-y-6 bg-white p-8 rounded-lg shadow">

        <h1 class="text-center text-2xl font-semibold text-gray-800 mb-4">
            Dodaj pacjenta
        </h1>

        {{-- POST /patients  --}}
        <x-forms.form method="POST" action="{{ route('patients.store') }}">
            @csrf

            <x-forms.input label="Imię"            name="first_name"  autocomplete="given-name"   />
            <x-forms.input label="Nazwisko"        name="last_name"   autocomplete="family-name"  />

            {{-- 11-cyfrowy PESEL --}}
            <x-forms.input
                label="PESEL"
                name="pesel"
                maxlength="11"
                pattern="[0-9]{11}"
                placeholder="11 cyfr"
            />

            {{-- Telefon (9 cyfr) --}}
            <x-forms.input
                label="Telefon"
                name="phone"
                type="tel"
                pattern="[0-9]{9}"
                maxlength="9"
                placeholder="501234567"
            />

            {{-- Data urodzenia --}}
            <x-forms.input
                label="Data urodzenia"
                name="date_of_birth"
                type="date"
            />

            {{-- Płeć --}}
            <x-forms.field label="Płeć" name="sex">
                <select name="sex"
                        class="block w-full rounded-md border-gray-300 bg-white py-2 px-3 shadow-sm
                               focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    <option value="" selected disabled>— wybierz —</option>
                    <option value=M>Mężczyzna</option>
                    <option value=F>Kobieta</option>
                    <option value="X">Inna / nie podano</option>
                </select>
                <x-forms.error :error="$errors->first('sex')" />
            </x-forms.field>

            {{-- Dodatkowe dane medyczne (opcjonalnie, zostaną zaszyfrowane) --}}
            <x-forms.field label="Notatka medyczna (opcjonalnie)" name="medical_json">
                <textarea name="medical_json"
                          rows="4"
                          placeholder='Npz. {"allergies":"penicylina"}'
                          class="block w-full rounded-md border-gray-300 py-2 px-3 shadow-sm
                                 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"></textarea>
                <x-forms.error :error="$errors->first('medical_json')" />
            </x-forms.field>

            <div class="pt-2">
                <x-forms.button class="w-full justify-center">
                    Zapisz pacjenta
                </x-forms.button>
            </div>
        </x-forms.form>

        <p class="text-center text-sm pt-2">
            <a href="{{ url()->previous() }}" class="text-indigo-600 hover:underline">Wróć</a>
        </p>
    </div>
</x-layout>

<x-layout>
    <div class="mx-auto max-w-lg space-y-6 bg-white p-8 rounded-lg shadow">

        <h1 class="text-center text-2xl font-semibold text-gray-800 mb-4">Dodaj lekarza</h1>

        <x-forms.form method="POST" action="{{ route('admin.users.doctors.store', $user) }}">
            @csrf

            {{-- standardowe pola --}}
            <x-forms.input label="Imię" name="first_name"/>
            <x-forms.input label="Nazwisko" name="last_name"/>

            <x-forms.input
                label="Numer telefonu"
                name="phone_number"
                type="tel"
                placeholder="987 654 321"
                pattern="[0-9]{9}"
                maxlength="9"
                autocomplete="tel"
            />

            <x-forms.input
                label="Numer PWZ"
                name="license_number"
                placeholder="1234567"
                maxlength="50"
                autocomplete="off"
            />

            {{-- === Specjalizacje (prosto) === --}}
            <x-forms.field label="Specjalizacje" name="specialities">
                {{-- istniejące – można zaznaczyć kilka (Ctrl / ⌘) --}}
                <select name="specialities[]" multiple
                        class="block w-full rounded-md border-gray-300 bg-white py-2 px-3 shadow-sm
                   focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    <!--foreach ($specializations as $spec)
                        <option value="{ $spec->id }}">{ $spec->name }}</option>
                    endforeach-->
                    <option value="1">1</option>
                    <option value="2">12</option>
                    <option value="3">134</option>
                    <option value="4">12345</option>
                </select>

                <x-forms.error :error="$errors->first('specialities')"/>
            </x-forms.field>

            <div class="pt-2">
                <x-forms.button class="w-full justify-center">Zapisz lekarza</x-forms.button>
            </div>
        </x-forms.form>

        <p class="text-center text-sm pt-2">
            <a href="{{ url()->previous() }}" class="text-indigo-600 hover:underline">Wróć</a>
        </p>
    </div>
</x-layout>

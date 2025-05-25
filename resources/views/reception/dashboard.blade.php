<x-layout>
    {{-- Statystyki dnia --}}
    <div class="grid gap-6 sm:grid-cols-3 mb-10">
        <x-panel class="text-center">
            <p class="text-sm text-gray-500">Dzisiejsze wizyty</p>
            <p class="text-2xl font-bold">18</p>
        </x-panel>
        <x-panel class="text-center">
            <p class="text-sm text-gray-500">Nowi pacjenci</p>
            <p class="text-2xl font-bold">3</p>
        </x-panel>
        <x-panel class="text-center">
            <p class="text-sm text-gray-500">Nieopłacone wizyty</p>
            <p class="text-2xl font-bold">2</p>
        </x-panel>
    </div>

    {{-- Połącz konto użytk. -> pacjent --}}
    <x-section-heading>Połącz konto z istniejącym pacjentem</x-section-heading>
    <x-panel class="space-y-6">
        {{-- Formularz wyszukania pacjenta --}}
        <x-forms.form action="#" method="POST">
            <div>

                <x-forms.input label="PESEL pacjenta" name="pesel"  />
            </div>
            <div>
                <x-forms.input label="E-mail użytkownika" name="user_email" type="email"  />
            </div>
            <x-forms.button>Połącz</x-forms.button>
        </x-forms.form>
    </x-panel>

    {{-- Dziś / jutro – wizyty --}}
    <x-section-heading class="mt-10">Nadchodzące wizyty</x-section-heading>
    <x-panel class="overflow-x-auto">
        <table class="min-w-full text-sm">
            <thead>
            <tr class="bg-gray-100 text-left">
                <th class="px-4 py-2">Data</th>
                <th class="px-4 py-2">Godz.</th>
                <th class="px-4 py-2">Pacjent</th>
                <th class="px-4 py-2">Lekarz</th>
                <th class="px-4 py-2"></th>
            </tr>
            </thead>
            <tbody>
            {{-- @foreach($upcomingAppointments as $appt) --}}
            <tr class="border-b">
                <td class="px-4 py-2">24.05.2025</td>
                <td class="px-4 py-2">11:45</td>
                <td class="px-4 py-2">Anna Nowak</td>
                <td class="px-4 py-2">dr Kowalski</td>
                <td class="px-4 py-2 text-right">
                    <a href="#" class="text-emerald-600 hover:underline">Edytuj</a>
                </td>
            </tr>
            {{-- @endforeach --}}
            </tbody>
        </table>
    </x-panel>

    {{-- Szybkie akcje --}}
    <x-section-heading class="mt-10">Szybkie akcje</x-section-heading>
    <div class="flex flex-wrap gap-4">
        <a href="#" class="text-sm text-white bg-emerald-600 hover:bg-emerald-700 px-4 py-2 rounded-md">+ Nowy pacjent</a>
        <a href="#" class="text-sm text-white bg-emerald-600 hover:bg-emerald-700 px-4 py-2 rounded-md">+ Zarejestruj wizytę</a>
    </div>
</x-layout>

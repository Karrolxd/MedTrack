<x-layout>
    <div class="grid gap-6 sm:grid-cols-3 mb-10">
        <!-- Statystyki (liczby wstawione „na sztywno”) -->
        <x-panel class="text-center">
            <p class="text-sm text-gray-500">Pacjenci pod opieką</p>
            <p class="text-2xl font-bold">42</p>
        </x-panel>
        <x-panel class="text-center">
            <p class="text-sm text-gray-500">Wizyty dzisiaj</p>
            <p class="text-2xl font-bold">5</p>
        </x-panel>
        <x-panel class="text-center">
            <p class="text-sm text-gray-500">Wizyty w tym tygodniu</p>
            <p class="text-2xl font-bold">18</p>
        </x-panel>
    </div>

    <x-section-heading>Dzisiaj ({{ now()->format('d.m.Y') }})</x-section-heading>
    {{-- @if($todayAppointments->isEmpty()) --}}
    {{-- <p class="text-sm text-gray-500">Brak wizyt.</p> --}}
    {{-- @else --}}
    <div class="overflow-x-auto">
        <table class="min-w-full text-sm">
            <thead>
            <tr class="bg-gray-100 text-left">
                <th class="px-4 py-2">Godz.</th>
                <th class="px-4 py-2">Pacjent</th>
                <th class="px-4 py-2">Notatka</th>
                <th class="px-4 py-2"></th>
            </tr>
            </thead>
            <tbody>
            {{-- @foreach($todayAppointments as $appt) --}}
            <tr class="border-b">
                <td class="px-4 py-2">09:30</td>
                <td class="px-4 py-2">Jan Kowalski</td>
                <td class="px-4 py-2">Kontrola</td>
                <td class="px-4 py-2 text-right">
                    <a href="#" class="text-emerald-600 hover:underline">Otwórz</a>
                </td>
            </tr>
            {{-- @endforeach --}}
            </tbody>
        </table>
    </div>
    {{-- @endif --}}

    <x-section-heading class="mt-10">Szybkie akcje</x-section-heading>
    <div class="flex flex-wrap gap-4">
        <a href="#" class="text-sm text-white bg-emerald-600 hover:bg-emerald-700 px-4 py-2 rounded-md">
            + Nowa wizyta
        </a>
        <a href="#" class="text-sm text-white bg-emerald-600 hover:bg-emerald-700 px-4 py-2 rounded-md">
            + Nowy pacjent
        </a>
    </div>
</x-layout>

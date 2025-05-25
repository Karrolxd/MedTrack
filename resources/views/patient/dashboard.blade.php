<x-layout>
    <x-section-heading>Nadchodzące wizyty</x-section-heading>

    {{-- @if($upcomingAppointments->isEmpty()) --}}
    {{-- <p class="text-sm text-gray-500">Nie masz zaplanowanych wizyt.</p> --}}
    {{-- @else --}}
    <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
        {{-- @foreach($upcomingAppointments as $appt) --}}
        <x-panel>
            <!-- Data/godzina -->
            <div class="text-sm text-gray-500">
                <!-- { $appt->date->format('d.m.Y') }} • { substr($appt->time,0,5) }} -->
                <span>23.05.2025 • 14:30</span>
            </div>
            <!-- Lekarz -->
            <h3 class="font-semibold text-gray-800">
                <!-- { $appt->doctor->first_name }} { $appt->doctor->last_name }} -->
                dr Przykład
            </h3>
            <!-- Notatka -->
            <p class="text-xs text-gray-600">Krótka notatka …</p>
            <a href="#" class="text-emerald-600 text-xs hover:underline mt-2 inline-block">Szczegóły</a>
        </x-panel>
        {{-- @endforeach --}}
    </div>
    {{-- @endif --}}

    <x-section-heading class="mt-10">Moi lekarze</x-section-heading>
    <div class="flex flex-wrap gap-2">
        {{-- @foreach($doctors as $doc) --}}
        {{-- <x-tag>dr Przykład</x-tag> --}}
        {{-- @endforeach --}}
    </div>

    <x-section-heading class="mt-10">Najnowsze e-recepty</x-section-heading>
    {{-- @if($prescriptions->isEmpty()) --}}
    {{-- <p class="text-sm text-gray-500">Brak recept.</p> --}}
    {{-- @else --}}
    <ul class="space-y-3">
        {{-- @foreach($prescriptions as $rx) --}}
        <li class="flex justify-between items-center text-sm">
            <span>22.05.2025</span>
            <a href="#" class="text-emerald-600 hover:underline">Pobierz PDF</a>
        </li>
        {{-- @endforeach --}}
    </ul>
    {{-- @endif --}}
</x-layout>

<x-layout>
    {{-- Statystyki główne --}}
    <div class="grid gap-6 sm:grid-cols-4 mb-10">
        <x-panel class="text-center">
            <p class="text-sm text-gray-500">Użytkownicy</p>
            <p class="text-2xl font-bold">{{ $countedUsers }}</p>
        </x-panel>
        <x-panel class="text-center">
            <p class="text-sm text-gray-500">Lekarze</p>
            <p class="text-2xl font-bold">{{ $countedDoctors }}</p>
        </x-panel>
        <x-panel class="text-center">
            <p class="text-sm text-gray-500">Pacjenci</p>
            <p class="text-2xl font-bold">{{ $countedPatients }}</p>
        </x-panel>
        <x-panel class="text-center">
            <p class="text-sm text-gray-500">Recepcjoniści</p>
            <p class="text-2xl font-bold">{{ $countedReceptionists}}</p>
        </x-panel>
    </div>

    {{-- Sekcja „Połącz konto z profilem” --}}
    <x-section-heading>Połącz istniejące konto z profilem</x-section-heading>
    <x-panel class="space-y-4">
        @if(! $guestUsers->count())
            <p class="text-xl text-gray-500">Brak użytkowników do przypisania</p>
        @else
            @foreach($guestUsers as $user)
                <div class="border rounded-lg p-4 flex items-center justify-between">
                    <div>
                        <p class="font-semibold">{{ $user->email }}</p>
                        <p class="text-xs text-gray-500">Brak przypisanego profilu</p>
                    </div>
                    <div class="flex gap-2">
                        <a href="{{ URL::signedRoute('admin.users.doctors.create', $user) }}"
                           class="text-xs text-emerald-600 hover:underline">
                            + Lekarz
                        </a>

                        <a href="#" class="text-xs text-emerald-600 hover:underline">+ Pacjent</a>
                        <a href="#" class="text-xs text-emerald-600 hover:underline">+ Recepcja</a>
                        <a href="#" class="text-xs text-emerald-600 hover:underline">+ Admin</a>
                    </div>
                </div>
            @endforeach
        @endif
    </x-panel>

    {{-- Szybkie akcje --}}
    <x-section-heading class="mt-10">Szybkie akcje</x-section-heading>
    <div class="flex flex-wrap gap-4">
        <a href="#" class="text-sm text-white bg-emerald-600 hover:bg-emerald-700 px-4 py-2 rounded-md">+ Nowy użytkownik</a>
        <a href="#" class="text-sm text-white bg-emerald-600 hover:bg-emerald-700 px-4 py-2 rounded-md">+ Nowy lekarz</a>
        <a href="{{ route('patients.create') }}" class="text-sm text-white bg-emerald-600 hover:bg-emerald-700 px-4 py-2 rounded-md">+ Nowy pacjent</a>
    </div>
</x-layout>

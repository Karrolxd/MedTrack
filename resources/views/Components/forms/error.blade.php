@props(['error' => false])

@if ($error)
    <p class="text-sm text-red-600 mt-1">{{ $error }}</p>
@endif

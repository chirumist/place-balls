@php
    $editForm = false;
    if (isset($ball->id) && $ball->id !== null) {
        $editForm = true;
    }
@endphp
<x-guest-layout>
    <div class="flex justify-between mb-4">
        <h4 class="text-xl font-semibold">{{ $editForm ? 'Edit' : 'Create' }} Balls</h4>
        <x-primary-link href="{{ route('balls.index') }}">Back</x-primary-link>
    </div>

    <x-auth-session-status class="mb-4" :status="session('success')" type="success" />
    <x-auth-session-status class="mb-4" :status="session('error')" type="error" />
    @if ($editForm)
        <form method="POST" action="{{ route('balls.update', $ball->id) }}">
            @method('PUT')
        @else
            <form method="POST" action="{{ route('balls.store') }}">
    @endif
    @csrf

    <!-- Email Address -->
    <div class="mb-3">
        <x-input-label for="name" :value="__('Name')" />
        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="$ball->name ?? old('name')" required
            autocomplete="name" />
        <x-input-error :messages="$errors->get('name')" class="mt-2" />
    </div>

    <div class="mb-3">
        <x-input-label for="color" :value="__('Color')" />
        <x-text-input id="color" class="block mt-1 w-full" type="color" name="color" :value="$ball->color ?? old('color')" required
            autocomplete="name" />
        <x-input-error :messages="$errors->get('color')" class="mt-2" />
    </div>

    <div class="mb-3">
        <x-input-label for="volume" :value="__('Volume (In Inches)')" />
        <x-text-input id="volume" class="block mt-1 w-full" type="number" name="volume" :value="$ball->volume ?? old('volume')"
            step="any" required autocomplete="volume" />
        <x-input-error :messages="$errors->get('volume')" class="mt-2" />
    </div>
    <x-primary-button href="{{ route('balls.index') }}">Save</x-primary-button>
    </form>


</x-guest-layout>

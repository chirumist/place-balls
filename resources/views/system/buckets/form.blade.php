@php
    $editForm = false;
    if (isset($bucket->id) && $bucket->id !== null) {
        $editForm = true;
    }
@endphp
<x-guest-layout>
    <div class="flex justify-between mb-4">
        <h4 class="text-xl font-semibold">{{ $editForm ? 'Edit' : 'Create' }} Bucket</h4>
        <x-primary-link href="{{ route('buckets.index') }}">Back</x-primary-link>
    </div>

    <x-auth-session-status class="mb-4" :status="session('success')" type="success" />
    <x-auth-session-status class="mb-4" :status="session('error')" type="error" />
    @if ($editForm)
        <form method="POST" action="{{ route('buckets.update', $bucket->id) }}">
            @method('PUT')
        @else
            <form method="POST" action="{{ route('buckets.store') }}">
    @endif
    @csrf

    <!-- Email Address -->
    <div class="mb-3">
        <x-input-label for="name" :value="__('Name')" />
        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="$bucket->name ?? old('name')" required
            autocomplete="name" />
        <x-input-error :messages="$errors->get('name')" class="mt-2" />
    </div>

    <div class="mb-3">
        <x-input-label for="total_volume" :value="__('Volume (In Inches)')" />
        <x-text-input id="total_volume" class="block mt-1 w-full" type="number" name="total_volume" :value="$bucket->total_volume ?? old('total_volume')"
            step="any" required autocomplete="volume" />
        <x-input-error :messages="$errors->get('total_volume')" class="mt-2" />
    </div>
    <x-primary-button href="{{ route('balls.index') }}">Save</x-primary-button>
    </form>


</x-guest-layout>

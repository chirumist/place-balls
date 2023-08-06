<x-guest-layout>
    <div class="flex justify-between mb-4">
        <h4 class="text-xl font-semibold">Buckets Suggestion</h4>
        <div class="flex gap-3">
            <x-secondary-link href="{{ route('welcome') }}">Home</x-secondary-link>
        </div>
    </div>

    <x-primary-button href="{{ route('welcome') }}">PLACE Balls IN BUCKET</x-primary-button>
</x-guest-layout>

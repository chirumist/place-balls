@props(['status', 'type'])

@if ($status && $type == 'success')
    <div
        {{ $attributes->merge(['class' => 'my-2 font-medium text-sm text-green-600 border px-4 py-2 rounded bg-green-100']) }}>
        {{ $status }}
    </div>
@endif

@if ($status && $type == 'error')
    <div
        {{ $attributes->merge(['class' => 'my-2 font-medium text-sm text-red-600 border px-4 py-2 rounded bg-red-100']) }}>
        {{ $status }}
    </div>
@endif

@props(['status'])

@if ($status)
    <div {{ $attributes->merge(['class' => 'font-medium text-sm text-[#2E7D32]']) }}>
        {{ $status }}
    </div>
@endif

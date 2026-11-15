@props(['status'])

@if ($status)
    <div {{ $attributes->merge(['class' => 'text-sm font-semibold text-[#2E7D32] dark:text-[#86C79A]']) }}>
        {{ $status }}
    </div>
@endif

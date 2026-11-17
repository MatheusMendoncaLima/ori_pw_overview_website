@props(['number', 'label', 'meta' => null])
<div {{ $attributes->class(['mb-10 flex flex-wrap items-center justify-between gap-2 border-b border-base-300 pb-3 text-[11px] font-extrabold uppercase tracking-[.12em] text-accent']) }}>
    <span>{{ $number }} / {{ $label }}</span>
    @if($meta)<span class="hidden sm:inline">{{ $meta }}</span>@endif
</div>

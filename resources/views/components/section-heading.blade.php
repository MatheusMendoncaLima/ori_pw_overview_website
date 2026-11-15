@props(['number', 'label', 'meta' => null])
<div {{ $attributes->class(['section-heading']) }}>
    <span>{{ $number }} / {{ $label }}</span>
    @if($meta)<span>{{ $meta }}</span>@endif
</div>

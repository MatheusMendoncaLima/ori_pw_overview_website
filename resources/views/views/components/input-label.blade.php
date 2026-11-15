@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-[#546E85]']) }}>
    {{ $value ?? $slot }}
</label>

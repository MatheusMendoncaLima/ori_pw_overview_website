@props(['value'])

<label {{ $attributes->merge(['class' => 'block text-sm font-semibold text-[#102A45] dark:text-[#E4EDF4]']) }}>
    {{ $value ?? $slot }}
</label>

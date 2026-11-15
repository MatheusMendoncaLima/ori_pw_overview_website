@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-1 pt-1 border-b-2 border-[#9B83D6] text-sm font-medium leading-5 text-[#102A45] focus:outline-none focus:border-[#A89BDB] transition duration-150 ease-in-out'
            : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-[#546E85] hover:text-[#546E85] hover:border-[#7A8C9C] focus:outline-none focus:text-[#546E85] focus:border-[#7A8C9C] transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>

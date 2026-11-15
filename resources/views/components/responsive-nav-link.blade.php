@props(['active'])

@php
$classes = ($active ?? false)
            ? 'block w-full ps-3 pe-4 py-2 border-l-4 border-[#9B83D6] text-start text-base font-medium text-[#9B83D6] bg-[#F0EBFB] focus:outline-none focus:text-[#102A45] focus:bg-[#F0EBFB] focus:border-[#A89BDB] transition duration-150 ease-in-out'
            : 'block w-full ps-3 pe-4 py-2 border-l-4 border-transparent text-start text-base font-medium text-[#546E85] hover:text-[#102A45] hover:bg-white hover:border-[#7A8C9C] focus:outline-none focus:text-[#102A45] focus:bg-white focus:border-[#7A8C9C] transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>

@props(['disabled' => false])

@php($classes = 'rounded-[14px] border border-[#7A8C9C] bg-white text-[#102A45] focus:border-[#0082A3] focus:ring-[#D2E6F5] dark:bg-[#142230] dark:text-[#E4EDF4]')

@if ($attributes->get('type') === 'password')
    {{-- Campo de senha com botão de mostrar/ocultar (como no wireframe de login) --}}
    <div class="relative" x-data="{ shown: false }">
        <input @disabled($disabled) {{ $attributes->merge(['class' => $classes.' !pr-14'])->except('type') }} :type="shown ? 'text' : 'password'" type="password">
        <button type="button" @click="shown = ! shown" :aria-pressed="shown.toString()" :aria-label="shown ? 'Ocultar senha' : 'Mostrar senha'" class="absolute right-1 top-1/2 grid h-11 w-11 -translate-y-1/2 place-items-center rounded-full text-[#546E85] hover:text-[#0082A3] focus-visible:outline focus-visible:outline-2 focus-visible:outline-[#0082A3] dark:text-[#A7B9C8]">
            <svg x-show="!shown" xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M2 12s3.6-7 10-7 10 7 10 7-3.6 7-10 7S2 12 2 12Z"/><circle cx="12" cy="12" r="3"/></svg>
            <svg x-show="shown" x-cloak xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M3 3l18 18"/><path d="M10.6 5.1A10.5 10.5 0 0 1 12 5c6.4 0 10 7 10 7a17 17 0 0 1-3.2 4M6.6 6.6A17 17 0 0 0 2 12s3.6 7 10 7a10 10 0 0 0 4.4-1"/><path d="M9.9 9.9a3 3 0 0 0 4.2 4.2"/></svg>
        </button>
    </div>
@else
    <input @disabled($disabled) {{ $attributes->merge(['class' => $classes]) }}>
@endif

@props(['href' => '/', 'caption' => 'Seu Apoio. Sempre.'])

<a {{ $attributes->class(['flex items-center gap-3 no-underline']) }} href="{{ $href }}" aria-label="ori — {{ $caption }}">
    <img class="h-9 w-auto shrink-0" src="{{ asset('images/ori-logo.svg') }}" alt="">
    <span class="font-brand text-[34px] font-black leading-none tracking-[-.075em] text-base-content">ori</span>
    <span class="hidden border-l border-base-300 pl-3 leading-tight sm:block"><strong class="block text-xs font-extrabold text-base-content">{{ $caption }}</strong><small class="block text-[10px] font-bold text-accent">organizar • comunicar • cuidar</small></span>
</a>

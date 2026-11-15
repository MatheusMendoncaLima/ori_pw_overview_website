@props(['href' => '/', 'caption' => 'Seu Apoio. Sempre.', 'variant' => ''])

<a class="logo-lockup {{ $variant }}" href="{{ $href }}" aria-label="ori — Seu Apoio. Sempre.">
    <img class="ori-logo" src="{{ asset('images/ori-logo.svg') }}" alt="">
    <span class="brand-wordmark">ori</span>
    <span class="brand-copy"><strong>{{ $caption }}</strong><small>organizar • comunicar • cuidar</small></span>
</a>

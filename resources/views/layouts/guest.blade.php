<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="theme-color" content="#F2FAFE">
    <title>@yield('title', 'Acesso · ori')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@400;500;600;700;800&family=Nunito:wght@700;800;900&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="flex min-h-screen flex-col bg-[#F2FAFE] font-sans text-[#102A45] antialiased dark:bg-[#0C1824] dark:text-[#E4EDF4]">
    <a class="sr-only rounded-full bg-white px-5 py-3 font-bold text-[#102A45] focus:not-sr-only focus:fixed focus:left-4 focus:top-4 focus:z-50" href="#auth-content">Pular para o formulário</a>

    <header class="mx-auto flex w-full max-w-6xl items-center justify-between gap-4 px-5 py-3 sm:px-8">
        <x-ori-brand :href="route('home')" />
        <a href="{{ route('home') }}" aria-label="Voltar ao site" class="inline-flex min-h-12 shrink-0 items-center justify-center rounded-full border border-[#7A8C9C] px-4 text-sm font-bold text-[#102A45] transition-colors hover:bg-[#E6F1FC] focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-[#0082A3] dark:text-[#E4EDF4] dark:hover:bg-[#1C2E3F]">
            <span aria-hidden="true" class="sm:mr-2">←</span><span class="hidden sm:inline">Voltar ao site</span>
        </a>
    </header>

    <main id="auth-content" class="relative isolate mx-auto grid w-full max-w-6xl flex-1 grid-cols-1 items-center justify-items-center gap-6 overflow-hidden px-5 py-4 sm:px-8 md:grid-cols-[minmax(0,1fr)_minmax(340px,480px)] md:gap-6">
        <div aria-hidden="true" class="pointer-events-none absolute -bottom-32 -right-24 -z-10 h-80 w-80 rounded-tl-full border-l-[16px] border-t-[16px] border-[#E1EFF8] sm:-right-10 sm:h-[28rem] sm:w-[28rem] dark:border-[#142230]"></div>
        <div aria-hidden="true" class="pointer-events-none absolute -bottom-24 -right-12 -z-10 h-64 w-64 rounded-tl-full border-l-[8px] border-t-[8px] border-[#D2E6F5] opacity-80 sm:right-4 sm:h-96 sm:w-96 dark:border-[#1C2E3F]"></div>

        <section aria-label="Identidade do ori" class="relative hidden min-h-[430px] w-full flex-col items-start justify-center overflow-hidden rounded-[28px] border border-[#D2E6F5] bg-[#E1EFF8] p-8 md:flex lg:p-12 dark:border-[#243849] dark:bg-[#142230]">
            <div class="relative z-10">
                <img class="mb-7 h-28 w-36 object-contain" src="{{ asset('images/ori-logo.svg') }}" alt="">
                <p class="mb-3 text-xs font-extrabold uppercase tracking-[.08em] text-[#5C768D] dark:text-[#A7B9C8]">Plataforma de apoio</p>
                <h1 class="font-sans text-4xl font-extrabold leading-[1.15] text-[#102A45] lg:text-5xl dark:text-[#E4EDF4]">Seu Apoio.<br>Sempre.</h1>
                <p class="mt-4 text-sm font-bold tracking-wide text-[#5C768D] dark:text-[#A7B9C8]">organizar • comunicar • cuidar</p>
                <p class="mt-7 max-w-sm text-base leading-7 text-[#546E85] dark:text-[#A7B9C8]">Rotina, comunicação alternativa e cuidado para pessoas com deficiência e quem as acompanha.</p>
            </div>
            <div aria-hidden="true" class="pointer-events-none absolute -bottom-20 -right-20 z-0 h-64 w-64 rounded-tl-full border-l-[16px] border-t-[16px] border-[#D2E6F5] dark:border-[#1C2E3F]"></div>
        </section>

        <section class="w-full max-w-[480px] rounded-[20px] border border-[#E5F0FA] bg-white p-5 sm:p-6 dark:border-[#243849] dark:bg-[#142230]">
            <div class="mb-4 flex items-center gap-3 rounded-[20px] border border-[#E5F0FA] bg-[#F2FAFE] px-3 py-2 md:hidden dark:border-[#243849] dark:bg-[#1C2E3F]">
                <span aria-hidden="true" class="grid h-10 w-10 shrink-0 place-items-center rounded-xl bg-[#E6F1FC] text-lg dark:bg-[#1D3C5A]">🤝</span>
                <div>
                    <p class="text-sm font-extrabold leading-5 text-[#102A45] dark:text-[#E4EDF4]">Bem-vindo(a)!</p>
                    <p class="mt-0.5 text-sm leading-5 text-[#546E85] dark:text-[#A7B9C8]">Acesse sua conta para continuar.</p>
                </div>
            </div>

            <p class="mb-2 text-xs font-extrabold uppercase tracking-[.08em] text-[#5C768D] dark:text-[#A7B9C8]">Área restrita · {{ request()->routeIs('register') ? 'criar conta' : (request()->routeIs('password.*') ? 'recuperar acesso' : 'acesso') }}</p>
            @yield('content'){{ $slot ?? '' }}
        </section>
    </main>
</body>
</html>

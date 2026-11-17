<x-app-layout>
    @php
        $card = 'rounded-[20px] border border-base-300 bg-base-100 p-6';
        $muted = 'text-base-content/70';
        $stats = [
            ['Conteúdos cadastrados', $statistics['total'] ?? 0, 'Itens no painel institucional', 'border-sky-200 bg-sky-50 dark:border-sky-900 dark:bg-sky-950/50'],
            ['Ativos no site', $statistics['active'] ?? 0, 'Visíveis para quem visita', 'border-emerald-200 bg-emerald-50 dark:border-emerald-900 dark:bg-emerald-950/50'],
            ['Inativos', $statistics['inactive'] ?? 0, 'Salvos no painel, fora do site', 'border-yellow-200 bg-yellow-50 dark:border-yellow-900 dark:bg-yellow-950/50'],
        ];
    @endphp
    <x-slot name="header">
        <div class="flex items-center gap-2 text-xs font-bold text-accent"><span>ORI</span><span aria-hidden="true">/</span><span>Área institucional</span></div>
        <div class="mt-3 flex flex-wrap items-end justify-between gap-4">
            <div>
                <x-eyebrow>Seu espaço de administração</x-eyebrow>
                <h1 class="mt-1 font-brand text-3xl font-extrabold tracking-tight sm:text-4xl">Olá, {{ auth()->user()->name }}.</h1>
                <p class="mt-1 {{ $muted }}">Acompanhe e organize as informações públicas do projeto.</p>
            </div>
            <span class="badge badge-outline badge-lg font-bold">{{ $roleLabels[auth()->user()->role] ?? 'Conta do site' }}</span>
        </div>
    </x-slot>

    <div class="mx-auto max-w-7xl space-y-8 px-4 py-10 sm:px-6 lg:px-8">
        <section class="{{ $card }} flex items-center justify-between gap-6 !p-8">
            <div class="max-w-xl">
                <x-eyebrow>Organizar · Comunicar · Cuidar</x-eyebrow>
                <h2 class="mt-2 font-brand text-3xl font-extrabold leading-tight">Conteúdo claro,<br><em class="not-italic text-primary">projeto bem cuidado.</em></h2>
                <p class="mt-3 {{ $muted }}">Este painel administra somente as informações institucionais deste site. Os dados pessoais e os recursos do aplicativo móvel continuam separados.</p>
            </div>
            <img class="hidden h-28 w-auto sm:block" src="{{ asset('images/ori-logo.svg') }}" alt="" aria-hidden="true">
        </section>

        @if(auth()->user()->role === 'admin')
            <section aria-labelledby="dashboard-overview-title">
                <div class="mb-4 flex flex-wrap items-end justify-between gap-3">
                    <div><x-eyebrow>Visão geral</x-eyebrow><h2 id="dashboard-overview-title" class="font-brand text-2xl font-extrabold">O site em números</h2></div>
                    <a class="font-bold text-primary underline underline-offset-4" href="{{ route('admin.contents.index') }}">Ver todos os conteúdos <span aria-hidden="true">→</span></a>
                </div>
                <div class="grid gap-4 sm:grid-cols-3">
                    @foreach($stats as [$label, $value, $hint, $tone])
                        <article class="rounded-[20px] border p-5 {{ $tone }}"><span class="text-sm font-bold {{ $muted }}">{{ $label }}</span><strong class="block font-brand text-5xl font-black">{{ $value }}</strong><small class="{{ $muted }}">{{ $hint }}</small></article>
                    @endforeach
                </div>
            </section>

            <section aria-labelledby="dashboard-shortcuts-title">
                <div class="mb-4"><x-eyebrow>Atalhos</x-eyebrow><h2 id="dashboard-shortcuts-title" class="font-brand text-2xl font-extrabold">O que você deseja fazer?</h2></div>
                <div class="grid gap-4 md:grid-cols-3">
                    @foreach([
                        ['01', 'Gerenciar conteúdo', 'Editar textos, seções e visibilidade da página institucional.', route('admin.contents.index'), '→'],
                        ['02', 'Meu perfil', 'Atualizar seus dados de acesso e as preferências da conta.', route('profile.edit'), '→'],
                        ['03', 'Ver site público', 'Conferir como as informações aparecem para visitantes.', route('home'), '↗'],
                    ] as [$n, $title, $copy, $url, $arrow])
                        <a class="{{ $card }} group flex items-start gap-4 transition hover:border-primary" href="{{ $url }}">
                            <span class="grid h-10 w-10 shrink-0 place-items-center rounded-xl bg-base-200 text-sm font-extrabold text-primary" aria-hidden="true">{{ $n }}</span>
                            <span class="flex-1"><strong class="block">{{ $title }}</strong><small class="{{ $muted }}">{{ $copy }}</small></span>
                            <span class="text-primary transition group-hover:translate-x-1" aria-hidden="true">{{ $arrow }}</span>
                        </a>
                    @endforeach
                </div>
            </section>
        @else
            <section class="{{ $card }}">
                <x-eyebrow>Sua conta</x-eyebrow>
                <h2 class="mt-1 font-brand text-2xl font-extrabold">Seu perfil do site</h2>
                <p class="mt-2 {{ $muted }}">Você pode atualizar seus dados de acesso. A edição dos conteúdos institucionais é reservada a administradores.</p>
                <a class="btn btn-primary mt-5" href="{{ route('profile.edit') }}">Abrir meu perfil <span aria-hidden="true">→</span></a>
            </section>
        @endif

        <aside class="alert alert-info items-start rounded-[20px] text-sm"><span class="grid h-6 w-6 shrink-0 place-items-center rounded-full bg-info-content/10 font-extrabold" aria-hidden="true">i</span><p>O painel não acessa contas, rotinas ou dados pessoais do aplicativo ORI. Ele mantém apenas contas do site e conteúdos institucionais em seu banco local.</p></aside>
    </div>
</x-app-layout>

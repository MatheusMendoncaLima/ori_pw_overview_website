@extends('layouts.institutional')
@section('title', 'ORI · rotina, comunicação e autonomia')
@section('content')
@php
    $record = fn (string $section) => $content->get($section)?->first();
    $wrap = 'mx-auto w-full max-w-7xl px-6 lg:px-12';
    $h2 = 'font-brand text-4xl font-extrabold leading-[1.1] tracking-tight text-base-content sm:text-5xl';
    $em = 'not-italic text-primary';
    $card = 'rounded-[20px] border border-base-300 bg-base-100 p-6 sm:p-8';
    $lead = 'text-lg font-bold leading-snug text-base-content';
    $muted = 'text-base-content/70';
    $navLink = 'rounded-full px-3 py-2 text-sm font-bold text-base-content/80 hover:text-primary';
    $pillars = [
        'routine' => ['01', 'bg-emerald-50 border-emerald-100 dark:bg-emerald-950/50 dark:border-emerald-900'],
        'communication' => ['02', 'bg-violet-50 border-violet-100 dark:bg-violet-950/50 dark:border-violet-900'],
        'personalization' => ['03', 'bg-sky-50 border-sky-100 dark:bg-sky-950/50 dark:border-sky-900'],
    ];
    $routines = [
        ['08:00', 'Higiene pessoal', 'bg-emerald-50 border-emerald-400 dark:bg-emerald-950/60'],
        ['09:00', 'Preparar a mochila', 'bg-orange-50 border-orange-400 dark:bg-orange-950/60'],
        ['10:30', 'Lanche', 'bg-yellow-50 border-yellow-400 dark:bg-yellow-950/60'],
        ['13:00', 'Escola', 'bg-sky-50 border-sky-400 dark:bg-sky-950/60'],
        ['15:30', 'Atividade sensorial', 'bg-violet-50 border-violet-400 dark:bg-violet-950/60'],
    ];
    $team = [
        ['name' => 'Mariana dos Santos Moreira', 'photo' => 'mariana-dos-santos-moreira.jpg'],
        ['name' => 'Matheus Mendonça de Lima', 'photo' => 'matheus-mendonca-de-lima.jpg'],
        ['name' => 'Nicollas Lopes Costa', 'photo' => 'nicollas-lopes-costa.jpg'],
    ];
@endphp

{{-- Cabeçalho --}}
<header x-data="{ open: false }" class="relative z-20 {{ $wrap }} flex h-20 items-center justify-between">
    <x-ori-brand href="#inicio" />
    <button class="btn btn-ghost btn-sm rounded-full md:hidden" type="button" @click="open = ! open" :aria-expanded="open.toString()" aria-controls="site-nav">Navegação <span aria-hidden="true">☰</span></button>
    <nav id="site-nav" aria-label="Navegação principal" :class="open && '!flex'" class="absolute inset-x-6 top-[76px] hidden flex-col gap-1 rounded-[20px] border border-base-300 bg-base-100 p-4 shadow-lg md:static md:flex md:flex-row md:items-center md:gap-2 md:border-0 md:bg-transparent md:p-0 md:shadow-none">
        <a class="{{ $navLink }}" @click="open = false" href="#projeto">O projeto</a>
        <a class="{{ $navLink }}" @click="open = false" href="#pilares">Pilares</a>
        <a class="{{ $navLink }}" @click="open = false" href="#arquitetura">Tecnologias</a>
        <a class="{{ $navLink }}" @click="open = false" href="#pesquisa">Pesquisa</a>
        <a class="{{ $navLink }}" @click="open = false" href="#equipe">Equipe</a>
        <a class="btn btn-primary btn-sm ml-0 mt-2 md:ml-2 md:mt-0" href="{{ route('login') }}">Área do site <span aria-hidden="true">↗</span></a>
    </nav>
</header>

<main id="main">
    {{-- Hero --}}
    <section id="inicio" class="relative isolate overflow-hidden">
        <div aria-hidden="true" class="pointer-events-none absolute -bottom-40 -right-32 -z-10 h-[34rem] w-[34rem] rounded-tl-full border-l-[18px] border-t-[18px] border-base-300"></div>
        <div aria-hidden="true" class="pointer-events-none absolute -bottom-28 -right-16 -z-10 h-[26rem] w-[26rem] rounded-tl-full border-l-[8px] border-t-[8px] border-base-300/70"></div>
        <div class="{{ $wrap }} grid items-center gap-14 py-12 lg:grid-cols-2 lg:py-20">
            <div>
                <p class="inline-flex items-center gap-2 rounded-full border border-base-300 bg-base-100 px-4 py-2 text-xs font-extrabold uppercase tracking-[.08em] text-base-content/80"><span class="h-2 w-2 rounded-full bg-primary" aria-hidden="true"></span>Projeto acadêmico · 9º ENGETEC · 2026</p>
                <h1 class="mt-6 font-brand text-5xl font-extrabold leading-[1.05] tracking-tight text-base-content sm:text-6xl">Organizar o dia.<br><em class="{{ $em }}">no seu ritmo.</em></h1>
                <p class="mt-6 max-w-xl text-lg {{ $muted }}">O ORI reúne rotina, comunicação alternativa e cuidado para pessoas com deficiência e quem as acompanha — com espaço para escolhas e preferências de cada pessoa.</p>
                <p class="mt-6 font-extrabold">Seu Apoio. Sempre.<span class="block text-xs font-bold text-accent">organizar • comunicar • cuidar</span></p>
                <div class="mt-8 flex flex-wrap items-center gap-4">
                    <a class="btn btn-primary min-h-[52px] px-7 text-base" href="#projeto">Conheça o ORI <span aria-hidden="true">↓</span></a>
                    <a class="font-bold text-base-content underline decoration-base-content/30 underline-offset-4 hover:text-primary" href="#pilares">Explore os recursos</a>
                </div>
                <p class="mt-10 border-l-2 border-primary pl-4 text-sm {{ $muted }}">ETEC Zona Leste · AMS · P-Tech<br>Parceria institucional com a IBM</p>
            </div>

            <div class="mx-auto w-full max-w-sm" role="img" aria-label="Prévia ilustrativa da tela Minha rotina do aplicativo ORI">
                <div class="rounded-[32px] border border-base-300 bg-base-200 p-5 shadow-xl">
                    <div class="flex justify-between text-[11px] font-bold text-base-content/70"><span>9:41</span><span aria-hidden="true">● ● ●</span></div>
                    <div class="mt-4 flex items-center justify-between"><p class="flex items-center gap-3 text-lg font-extrabold"><span aria-hidden="true">←</span>Minha rotina</p><span class="grid h-9 w-9 place-items-center rounded-full bg-base-100 text-xs font-black" aria-hidden="true">•••</span></div>
                    <div class="mt-4 flex items-baseline justify-between"><strong class="text-sm">Maio 2025</strong><span class="text-xs {{ $muted }}">Hoje, quarta-feira</span></div>
                    <div class="mt-3 grid grid-cols-7 gap-1 text-center text-[10px] font-bold text-base-content/60" aria-label="Semana">
                        @foreach(['Seg' => 12, 'Ter' => 13, 'Qua' => 14, 'Qui' => 15, 'Sex' => 16, 'Sáb' => 17, 'Dom' => 18] as $day => $date)
                            <span class="grid justify-items-center gap-1 rounded-full py-1 {{ $date === 14 ? 'bg-secondary text-secondary-content' : '' }}">{{ $day }}<b class="text-xs">{{ $date }}</b></span>
                        @endforeach
                    </div>
                    <ul class="mt-4 space-y-2">
                        @foreach($routines as [$time, $label, $tone])
                            <li class="flex items-center gap-3 rounded-xl border-l-4 px-3 py-2.5 text-sm font-bold {{ $tone }}"><time class="text-[11px] font-bold text-base-content/60">{{ $time }}</time>{{ $label }}</li>
                        @endforeach
                    </ul>
                    <span class="btn btn-secondary mx-auto mt-5 flex w-fit">+ Adicionar atividade</span>
                </div>
            </div>
        </div>
    </section>

    {{-- Faixa animada --}}
    <section class="overflow-hidden border-y border-base-300 bg-base-300/60 py-4" aria-label="Ideias do projeto">
        <div class="flex w-max animate-marquee gap-8 whitespace-nowrap text-xs font-extrabold uppercase tracking-[.14em] text-base-content/70 motion-reduce:animate-none" aria-hidden="false">
            @foreach(range(1, 2) as $loop2)
                @foreach(['Rotina com significado', 'Comunicação acessível', 'Escolhas que são suas', 'Organizar', 'Comunicar', 'Cuidar'] as $phrase)
                    <span>{{ $phrase }}</span><span aria-hidden="true" class="text-primary">•</span>
                @endforeach
            @endforeach
        </div>
    </section>

    {{-- 01 Quem somos --}}
    <section id="projeto" class="{{ $wrap }} py-20">
        <x-section-heading number="01" label="QUEM SOMOS" meta="A IDEIA POR TRÁS DO ORI" />
        @if($who = $record('who-we-are'))
            <div class="grid items-start gap-10 lg:grid-cols-2">
                <h2 class="{{ $h2 }}">Mais clareza<br>para viver<br><em class="{{ $em }}">o cotidiano.</em></h2>
                <div class="{{ $card }}">
                    <x-eyebrow>{{ $who->badge }}</x-eyebrow>
                    <h3 class="mt-2 font-brand text-2xl font-extrabold">{{ $who->title }}</h3>
                    <p class="mt-3 {{ $lead }}">{{ $who->summary }}</p>
                    <p class="mt-3 {{ $muted }}">{{ $who->details }}</p>
                </div>
            </div>
        @endif
        <div class="mt-10 grid gap-5 md:grid-cols-2">
            @if($problem = $record('problem'))
                <article class="{{ $card }} border-sky-100 bg-sky-50 dark:border-sky-900 dark:bg-sky-950/50">
                    <x-eyebrow>02 · {{ $problem->badge }}</x-eyebrow>
                    <h3 class="mt-2 font-brand text-2xl font-extrabold">{{ $problem->title }}</h3>
                    <p class="mt-3 {{ $lead }}">{{ $problem->summary }}</p>
                    <p class="mt-3 text-sm {{ $muted }}">{{ $problem->details }}</p>
                </article>
            @endif
            @if($objectives = $record('objectives'))
                <article class="{{ $card }} border-emerald-100 bg-emerald-50 dark:border-emerald-900 dark:bg-emerald-950/50">
                    <x-eyebrow>03 · {{ $objectives->badge }}</x-eyebrow>
                    <h3 class="mt-2 font-brand text-2xl font-extrabold">{{ $objectives->title }}</h3>
                    <p class="mt-3 {{ $lead }}">{{ $objectives->summary }}</p>
                    <div class="mt-4 flex flex-wrap gap-2">
                        @foreach(['Literatura', 'Escopo do MVP', 'Perfis e permissões', 'Arquitetura', 'Prototipação', 'Implementação', 'Testes e evidências'] as $chip)
                            <span class="rounded-full border border-base-300 bg-base-100 px-3 py-1 text-xs font-bold">{{ $chip }}</span>
                        @endforeach
                    </div>
                </article>
            @endif
        </div>
    </section>

    {{-- 02 Pilares --}}
    <section id="pilares" class="border-y border-base-300 bg-base-100 py-20">
        <div class="{{ $wrap }}">
            <x-section-heading number="02" label="OS TRÊS PILARES" meta="RECURSOS CONECTADOS, PREFERÊNCIAS COMPARTILHADAS" />
            <div class="mb-10 grid items-end gap-6 lg:grid-cols-2">
                <h2 class="{{ $h2 }}">Uma experiência.<br><em class="{{ $em }}">Três frentes.</em></h2>
                <p class="max-w-md {{ $muted }}">O MVP combina organização da rotina, comunicação e personalização em um aplicativo móvel.</p>
            </div>
            <div class="grid gap-5 md:grid-cols-3">
                @foreach($pillars as $section => [$number, $tone])
                    @if($pillar = $record($section))
                        <article class="flex flex-col rounded-[20px] border p-6 {{ $tone }}">
                            <div class="flex items-center justify-between text-sm font-extrabold text-accent">
                                <span>{{ $number }}</span>
                                <span class="grid h-10 w-10 place-items-center rounded-xl bg-base-100 font-extrabold text-secondary" aria-hidden="true">
                                    @switch($section)
                                        @case('routine')<svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4.5" width="18" height="16" rx="3"/><path d="M8 2.5v4M16 2.5v4M3 9.5h18M8 14l2.2 2.2L15 12"/></svg>@break
                                        @case('communication')<svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 12a8 8 0 0 1-11.6 7.1L4 20.5l1.4-4.6A8 8 0 1 1 21 12Z"/><path d="M8.5 12h.01M12 12h.01M15.5 12h.01"/></svg>@break
                                        @default Aa
                                    @endswitch
                                </span>
                            </div>
                            <x-eyebrow class="mt-6">{{ $pillar->badge }}</x-eyebrow>
                            <h3 class="mt-1 font-brand text-2xl font-extrabold">{{ $pillar->title }}</h3>
                            <p class="mt-2 text-sm {{ $muted }}">{{ $pillar->summary }}</p>
                            <details class="group mt-auto border-t border-base-content/10 pt-4">
                                <summary class="flex cursor-pointer list-none items-center justify-between text-sm font-extrabold">Como funciona no escopo <span aria-hidden="true" class="transition group-open:rotate-45">+</span></summary>
                                <p class="mt-3 text-sm {{ $muted }}">{{ $pillar->details }}</p>
                            </details>
                        </article>
                    @endif
                @endforeach
            </div>
            <p class="mx-auto mt-8 max-w-2xl text-center text-xs {{ $muted }}">O artigo descreve funções implementadas no cliente Android. Os requisitos e as regras de segurança ainda não foram verificados pelo protocolo formal de testes.</p>
        </div>
    </section>

    {{-- Autonomia --}}
    <section class="{{ $wrap }} grid items-center gap-12 py-20 lg:grid-cols-2">
        <div class="relative mx-auto grid aspect-square w-full max-w-md place-items-center" aria-hidden="true">
            <div class="absolute inset-0 rounded-full border border-base-300"></div>
            <div class="absolute inset-12 rounded-full border border-primary/30"></div>
            <div class="grid h-32 w-32 place-items-center rounded-full bg-primary text-center font-brand text-2xl font-black leading-tight text-primary-content">EU<br><span class="text-sm font-bold">escolho</span></div>
            <span class="absolute left-0 top-12 rounded-full border border-base-300 bg-base-100 px-3 py-1 text-xs font-bold">preferências</span>
            <span class="absolute right-0 top-1/2 rounded-full border border-base-300 bg-base-100 px-3 py-1 text-xs font-bold">apoio</span>
            <span class="absolute bottom-10 left-8 rounded-full border border-base-300 bg-base-100 px-3 py-1 text-xs font-bold">autonomia</span>
        </div>
        <div>
            <x-eyebrow>Autonomia-first</x-eyebrow>
            <h2 class="mt-2 {{ $h2 }}">O apoio acompanha.<br><em class="{{ $em }}">A escolha continua sua.</em></h2>
            <p class="mt-5 {{ $muted }}">O ORI considera diferentes níveis de autonomia. A distinção entre usuário principal e cuidador organiza permissões, sem presumir incapacidade ou retirar a participação da pessoa nas decisões que lhe dizem respeito.</p>
            <p class="mt-3 {{ $muted }}">Preferências de acessibilidade e participação de cuidadores devem se ajustar a cada pessoa e contexto.</p>
            <a class="mt-5 inline-block font-bold text-primary underline underline-offset-4" href="#metodologia">Como essa proposta será avaliada <span aria-hidden="true">↓</span></a>
        </div>
    </section>

    {{-- 03 Fundamentação --}}
    <section id="fundamentos" class="{{ $wrap }} pb-20">
        <x-section-heading number="03" label="FUNDAMENTAÇÃO E ACESSIBILIDADE" meta="CONCEITOS QUE ORIENTAM O DESIGN" />
        @if($foundations = $record('foundations'))
            <div class="grid items-start gap-8 lg:grid-cols-[1.3fr_1fr]">
                <div class="{{ $card }}">
                    <x-eyebrow>{{ $foundations->badge }}</x-eyebrow>
                    <h2 class="mt-2 font-brand text-3xl font-extrabold leading-tight">{{ $foundations->title }}</h2>
                    <p class="mt-4 {{ $lead }}">{{ $foundations->summary }}</p>
                    <p class="mt-3 text-sm {{ $muted }}">{{ $foundations->details }}</p>
                </div>
                <div class="{{ $card }}">
                    <x-eyebrow>Princípios de design</x-eyebrow>
                    <ol class="mt-3 divide-y divide-base-300">
                        @foreach(['Hierarquia visual clara', 'Navegação simplificada', 'Menos elementos desnecessários', 'Interações previsíveis', 'Personalização da interface'] as $i => $principle)
                            <li class="flex gap-3 py-3 text-sm font-bold"><b class="text-primary">{{ sprintf('%02d', $i + 1) }}</b>{{ $principle }}</li>
                        @endforeach
                    </ol>
                    <p class="mt-3 text-xs {{ $muted }}">Princípios de projeto não substituem testes com pessoas representativas do público.</p>
                </div>
            </div>
        @endif
    </section>

    {{-- 04 Arquitetura --}}
    <section id="arquitetura" class="border-y border-base-300 bg-base-100 py-20">
        <div class="{{ $wrap }}">
            <x-section-heading number="04" label="ARQUITETURA E TECNOLOGIAS" meta="RESPONSABILIDADES EM CAMADAS" />
            <div class="mb-10 grid items-end gap-6 lg:grid-cols-2">
                <h2 class="{{ $h2 }}">O mobile e o site<br><em class="{{ $em }}">têm fronteiras claras.</em></h2>
                <p class="max-w-md {{ $muted }}">O sistema Android mantém sua arquitetura própria. O Laravel administra apenas esta plataforma institucional.</p>
            </div>
            @if($architecture = $record('architecture'))
                <p class="mb-8 max-w-3xl {{ $lead }}">{{ $architecture->summary }}</p>
                <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
                    @foreach([
                        ['CAMADA 01 · APLICATIVO', 'Android nativo', 'Kotlin · Jetpack Compose · Material 3 · MVVM · StateFlow · Hilt · Navigation Compose', 'Apresentação por módulos e navegação do cliente móvel.'],
                        ['CAMADA 02 · IDENTIDADE', 'Firebase Authentication', 'Credenciais e autenticação · Identificador firebaseUid', 'O app não armazena credenciais próprias.'],
                        ['CAMADA 03 · DADOS DO APP', 'Cloud Firestore', 'Rotina · vínculos · CAA · preferências', 'Dados de domínio e sincronização do aplicativo.'],
                        ['CAMADA 04 · AUTORIZAÇÃO', 'Firestore Security Rules', 'Permissões de acesso aos dados', 'Implementadas no projeto; ainda não testadas.'],
                        ['CAMADA 05 · LÓGICA DE SERVIDOR', 'Firebase Cloud Functions', 'Node.js · TypeScript', 'Projeto inicializado, sem funções implementadas no estágio descrito.'],
                    ] as [$tag, $name, $stack, $note])
                        <article class="rounded-[20px] border border-base-300 bg-base-200 p-5">
                            <x-eyebrow>{{ $tag }}</x-eyebrow>
                            <h3 class="mt-2 font-brand text-xl font-extrabold">{{ $name }}</h3>
                            <p class="mt-2 text-sm font-bold">{{ $stack }}</p>
                            <small class="mt-3 block text-xs {{ $muted }}">{{ $note }}</small>
                        </article>
                    @endforeach
                </div>
                <div class="mt-6 flex gap-4 rounded-[20px] bg-secondary p-6 text-secondary-content">
                    <span class="text-2xl" aria-hidden="true">↳</span>
                    <div><strong>Este site institucional · Laravel 13 · PHP · Blade · Tailwind · SQLite</strong><p class="mt-1 text-sm opacity-90">Banco local exclusivamente para contas do site e conteúdos institucionais. Sem conexão com dados pessoais, Firebase Authentication ou Firestore do app.</p></div>
                </div>
            @endif
        </div>
    </section>

    {{-- 05 Metodologia --}}
    <section id="metodologia" class="{{ $wrap }} py-20">
        <x-section-heading number="05" label="METODOLOGIA E AVALIAÇÃO" meta="PESQUISA APLICADA · EXPLORATÓRIA · DESCRITIVA" />
        <div class="grid items-start gap-10 lg:grid-cols-2">
            @if($methodology = $record('methodology'))
                <div>
                    <x-eyebrow>{{ $methodology->badge }}</x-eyebrow>
                    <h2 class="mt-2 {{ $h2 }}">Da pesquisa<br>à <em class="{{ $em }}">validação.</em></h2>
                    <p class="mt-5 {{ $lead }}">{{ $methodology->summary }}</p>
                    <p class="mt-3 {{ $muted }}">{{ $methodology->details }}</p>
                </div>
            @endif
            <ol class="grid gap-3">
                @foreach(['Levantamento bibliográfico', 'Análise documental', 'Requisitos e modelagem', 'Prototipação no Figma', 'Desenvolvimento Android'] as $i => $step)
                    <li class="flex items-center gap-4 rounded-2xl border border-base-300 bg-base-100 px-5 py-4"><span class="grid h-9 w-9 place-items-center rounded-full bg-base-200 text-sm font-extrabold text-primary">{{ sprintf('%02d', $i + 1) }}</span><strong>{{ $step }}</strong></li>
                @endforeach
                <li class="flex items-center gap-4 rounded-2xl border border-dashed border-accent bg-base-100 px-5 py-4"><span class="grid h-9 w-9 place-items-center rounded-full bg-base-200 text-sm font-extrabold text-accent">06</span><div><strong>Avaliação funcional planejada</strong><small class="block text-xs {{ $muted }}">Não executada no estágio descrito no artigo</small></div></li>
            </ol>
        </div>
    </section>

    {{-- 06 Estágio atual --}}
    <section id="pesquisa" class="bg-neutral py-20 text-neutral-content dark:bg-base-100 dark:text-base-content">
        <div class="{{ $wrap }} grid gap-12 lg:grid-cols-[1.4fr_1fr]">
            <div>
                <x-section-heading number="06" label="ESTÁGIO ATUAL" meta="9º ENGETEC · 2026" class="border-white/20 text-white/70" />
                <x-eyebrow class="text-primary">Implementado no cliente Android, ainda não verificado em testes</x-eyebrow>
                @if($status = $record('team-status'))
                    <h2 class="mt-3 font-brand text-4xl font-extrabold leading-tight">{{ $status->title }}</h2>
                    <p class="mt-4 text-lg font-bold">{{ $status->summary }}</p>
                    <div class="mt-6 rounded-2xl border border-white/15 p-5"><x-eyebrow class="text-primary">Artigo, README e repositório</x-eyebrow><p class="mt-2 text-sm opacity-80">{{ $status->details }}</p></div>
                @endif
                <a class="btn btn-primary mt-8 min-h-[52px]" href="https://github.com/MatheusMendoncaLima/ori" target="_blank" rel="noopener noreferrer">Abrir repositório no GitHub <span aria-hidden="true">↗</span></a>
            </div>
            <aside class="self-end rounded-[20px] border border-white/15 p-6">
                <x-eyebrow class="text-primary">Limites do que sabemos</x-eyebrow>
                <p class="mt-3 flex items-end gap-3 font-brand text-7xl font-black leading-none">0<span class="pb-2 font-sans text-xs font-bold opacity-80">resultados de teste<br>reportados pelo artigo</span></p>
                <p class="mt-4 text-sm opacity-80">O protocolo funcional interno ainda não foi executado. Não há conclusões apresentadas sobre desempenho, usabilidade, acessibilidade efetiva ou ganho de autonomia.</p>
                <p class="mt-5 flex items-center justify-between border-t border-white/15 pt-4 text-xs font-extrabold tracking-widest"><span>STATUS</span><strong class="inline-flex items-center gap-2"><i class="h-2 w-2 rounded-full bg-warning"></i>A VALIDAR</strong></p>
            </aside>
        </div>
    </section>

    {{-- 07 Equipe --}}
    <section id="equipe" class="{{ $wrap }} py-20">
        <x-section-heading number="07" label="EQUIPE E CONTEXTO ACADÊMICO" meta="ETEC ZONA LESTE · AMS · P-TECH" />
        <div class="mb-10 flex flex-wrap items-end justify-between gap-4">
            <h2 class="{{ $h2 }}">Construído<br><em class="{{ $em }}">em equipe.</em></h2>
            <p class="{{ $muted }}">Desenvolvimento de Sistemas<br>Parceria institucional com a IBM</p>
        </div>
        <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
            @foreach ($team as $member)
                @php($hasPhoto = file_exists(public_path('images/team/'.$member['photo'])))
                <article class="{{ $card }} !p-4">
                    <div class="grid aspect-[4/3] place-items-center overflow-hidden rounded-2xl bg-base-200 text-xs font-bold uppercase tracking-widest text-accent" role="img" aria-label="{{ $hasPhoto ? 'Foto de ' : 'Espaço reservado para foto de ' }}{{ $member['name'] }}">
                        @if ($hasPhoto)<img class="h-full w-full object-cover" src="{{ asset('images/team/'.$member['photo']) }}" alt="">@else<span>foto da equipe</span>@endif
                    </div>
                    <h3 class="mt-4 font-brand text-lg font-extrabold">{{ $member['name'] }}</h3>
                    <span class="text-xs font-extrabold tracking-widest text-accent">DESENVOLVIMENTO</span>
                </article>
            @endforeach
        </div>
    </section>

    {{-- Escopo --}}
    <section class="border-y border-base-300 bg-base-100 py-20">
        <div class="{{ $wrap }} grid items-start gap-10 lg:grid-cols-2">
            <div><x-eyebrow>Escopo do MVP</x-eyebrow><h2 class="mt-2 {{ $h2 }}">O que ficou<br><em class="{{ $em }}">para depois.</em></h2></div>
            <div>
                <p class="{{ $muted }}">Para manter o protótipo focado nas funções essenciais e reduzir complexidade técnica e ética, estes recursos estão explicitamente fora do MVP:</p>
                <div class="mt-5 flex flex-wrap gap-2">
                    @foreach(['Geração de rotinas por IA', 'Monitoramento avançado de comportamento', 'Diagnóstico e acompanhamento clínico', 'Gamificação', 'Relatórios complexos', 'Notificações avançadas'] as $out)
                        <span class="rounded-full border border-base-300 bg-base-200 px-4 py-2 text-sm font-bold">{{ $out }}</span>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    {{-- 08 Referências --}}
    <section id="referencias" class="{{ $wrap }} py-20">
        <x-section-heading number="08" label="REFERÊNCIAS BIBLIOGRÁFICAS" meta="FONTES DO ARTIGO CIENTÍFICO" />
        <div class="grid items-start gap-10 lg:grid-cols-[.8fr_1.2fr]">
            <h2 class="{{ $h2 }}">Uma conversa<br>com <em class="{{ $em }}">outras pesquisas.</em></h2>
            <ol class="list-decimal space-y-4 pl-5 text-sm marker:font-extrabold marker:text-primary">
                @foreach($references as [$citation, $url])
                    <li class="pl-2"><p class="{{ $muted }}">{{ $citation }}</p>@if($url)<a class="break-all font-bold text-primary underline underline-offset-4" href="{{ $url }}" target="_blank" rel="noopener noreferrer">{{ str_starts_with($url, 'https://doi.org/') ? str_replace('https://doi.org/', 'doi: ', $url) : $url }} <span aria-hidden="true">↗</span></a>@endif</li>
                @endforeach
            </ol>
        </div>
    </section>

    {{-- Fechamento --}}
    <section class="relative isolate overflow-hidden bg-primary px-6 py-24 text-center text-primary-content">
        <div aria-hidden="true" class="pointer-events-none absolute -bottom-32 -right-24 -z-10 h-96 w-96 rounded-tl-full border-l-[16px] border-t-[16px] border-white/15"></div>
        <p class="text-xs font-extrabold uppercase tracking-[.14em] opacity-80">ORI · Tecnologia assistiva</p>
        <h2 class="mt-3 font-brand text-4xl font-extrabold leading-tight sm:text-6xl">Um cotidiano<br>com mais <em class="not-italic opacity-80">possibilidades.</em></h2>
        <a class="btn mt-8 min-h-[52px] border-0 bg-white text-neutral hover:bg-base-300" href="#inicio">Voltar ao início <span aria-hidden="true">↑</span></a>
    </section>
</main>

<footer class="{{ $wrap }} flex flex-col items-start justify-between gap-6 py-10 text-sm md:flex-row md:items-center">
    <x-ori-brand href="#inicio" />
    <p class="{{ $muted }}">Projeto acadêmico · ETEC Zona Leste<br>Desenvolvimento de Sistemas · AMS · P-Tech</p>
    <a class="font-bold text-primary underline underline-offset-4" href="https://github.com/MatheusMendoncaLima/ori" target="_blank" rel="noopener noreferrer">Repositório oficial <span aria-hidden="true">↗</span></a>
    <span class="text-xs {{ $muted }}">© ORI · 2026</span>
</footer>
@endsection

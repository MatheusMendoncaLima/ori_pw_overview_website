@extends('layouts.institutional')
@section('title', 'ORI · rotina, comunicação e autonomia')
@section('body-class', 'public-body ori-home')
@section('content')
@php($record = fn (string $section) => $content->get($section)?->first())
<header class="site-header">
    <x-ori-brand href="#inicio" />
    <button class="nav-toggle" aria-expanded="false" aria-controls="site-nav">Navegação <span aria-hidden="true">☰</span></button>
    <nav class="site-nav" id="site-nav" aria-label="Navegação principal"><a href="#projeto">O projeto</a><a href="#pilares">Pilares</a><a href="#arquitetura">Tecnologias</a><a href="#pesquisa">Pesquisa</a><a href="#equipe">Equipe</a><a class="nav-login" href="{{ route('login') }}">Área do site <span aria-hidden="true">↗</span></a></nav>
</header>
<main id="main">
    <section class="hero-section app-home-hero" id="inicio">
        <div class="hero-copy">
            <p class="eyebrow"><span class="status-dot" aria-hidden="true"></span> PROJETO ACADÊMICO · 9º ENGETEC · 2026</p>
            <h1>Organizar o dia.<br><em>no seu ritmo.</em></h1>
            <p class="hero-summary">O ORI reúne rotina, comunicação alternativa e cuidado para pessoas com deficiência e quem as acompanha — com espaço para escolhas e preferências de cada pessoa.</p>
            <p class="hero-promise">Seu Apoio. Sempre.<span>organizar • comunicar • cuidar</span></p>
            <div class="hero-links"><a class="button button-dark btn btn-primary" href="#projeto">Conheça o ORI <span aria-hidden="true">↓</span></a><a class="quiet-link" href="#pilares">Explore os recursos <span aria-hidden="true">↘</span></a></div>
            <div class="hero-meta"><span class="meta-rule" aria-hidden="true"></span><span>ETEC Zona Leste · AMS · P-Tech<br>Parceria institucional com a IBM</span></div>
        </div>
        <div class="hero-illustration wireframe-preview" role="img" aria-label="Prévia ilustrativa da tela Minha rotina do aplicativo ORI">
            <div class="routine-preview-card card bg-base-100">
                <div class="preview-status"><span>9:41</span><span aria-hidden="true">● ● ●</span></div>
                <div class="preview-screen-heading"><div><span class="preview-back" aria-hidden="true">←</span><strong>Minha rotina</strong></div><span class="preview-more" aria-hidden="true">•••</span></div>
                <div class="preview-date"><strong>Maio 2025</strong><span>Hoje, quarta-feira</span></div>
                <div class="preview-week" aria-label="Semana"><span>Seg<b>12</b></span><span>Ter<b>13</b></span><span class="is-today">Qua<b>14</b></span><span>Qui<b>15</b></span><span>Sex<b>16</b></span><span>Sáb<b>17</b></span><span>Dom<b>18</b></span></div>
                <div class="preview-routines">
                    <div class="routine-row routine-mint"><time>08:00</time><span>Higiene pessoal</span></div>
                    <div class="routine-row routine-orange"><time>09:00</time><span>Preparar a mochila</span></div>
                    <div class="routine-row routine-yellow"><time>10:30</time><span>Lanche</span></div>
                    <div class="routine-row routine-blue"><time>13:00</time><span>Escola</span></div>
                    <div class="routine-row routine-lilac"><time>15:30</time><span>Atividade sensorial</span></div>
                </div>
                <span class="preview-add btn btn-secondary">+ Adicionar atividade</span>
            </div>
        </div>
        <a class="scroll-cue" href="#projeto"><span>CONHEÇA O PROJETO</span><i aria-hidden="true">↓</i></a>
    </section>

    <section class="ticker" aria-label="Ideias do projeto"><div class="ticker-track"><span>ROTINA COM SIGNIFICADO</span><i aria-hidden="true">•</i><span>COMUNICAÇÃO ACESSÍVEL</span><i aria-hidden="true">•</i><span>ESCOLHAS QUE SÃO SUAS</span><i aria-hidden="true">•</i><span>ROTINA COM SIGNIFICADO</span></div></section>

    <section class="project-section section-wrap" id="projeto">
        <x-section-heading number="01" label="QUEM SOMOS" meta="A IDEIA POR TRÁS DO ORI" />
        @if($who = $record('who-we-are'))<div class="intro-layout"><h2>Mais clareza<br>para viver<br><em>o cotidiano.</em></h2><div class="intro-text"><span class="eyebrow">{{ $who->badge }}</span><h3>{{ $who->title }}</h3><p class="lead-copy">{{ $who->summary }}</p><p>{{ $who->details }}</p><div class="principle-stamp"><span>ORI</span><small>APOIO QUE<br>ACOMPANHA</small><i aria-hidden="true">•</i></div></div></div>@endif
        <div class="motivation-grid">@if($problem = $record('problem'))<article class="motivation-card motivation-dark"><span class="card-index">02 · {{ $problem->badge }}</span><h3>{{ $problem->title }}</h3><p class="motivation-lead">{{ $problem->summary }}</p><p>{{ $problem->details }}</p><span class="card-decoration" aria-hidden="true">↗</span></article>@endif
        @if($objectives = $record('objectives'))<article class="motivation-card motivation-lime"><span class="card-index">03 · {{ $objectives->badge }}</span><h3>{{ $objectives->title }}</h3><p class="motivation-lead">{{ $objectives->summary }}</p><div class="objective-chips"><span>Literatura</span><span>Escopo do MVP</span><span>Perfis e permissões</span><span>Arquitetura</span><span>Prototipação</span><span>Implementação</span><span>Testes e evidências</span></div></article>@endif</div>
    </section>

    <section class="pillars-section" id="pilares"><div class="section-wrap"><x-section-heading number="02" label="OS TRÊS PILARES" meta="RECURSOS CONECTADOS, PREFERÊNCIAS COMPARTILHADAS" /><div class="section-title-row"><h2>Uma experiência.<br><em>Três frentes.</em></h2><p>O MVP combina organização da rotina, comunicação e personalização em um aplicativo móvel.</p></div><div class="pillar-grid">
        @foreach(['routine' => '01', 'communication' => '02', 'personalization' => '03'] as $section => $number)
            @if($pillar = $record($section))<article class="pillar-card pillar-{{ $section }}"><div class="pillar-card-top"><span>{{ $number }}</span><span class="pillar-glyph" aria-hidden="true">{{ ['routine' => '↗', 'communication' => '◌', 'personalization' => 'Aa'][$section] }}</span></div><span class="eyebrow">{{ $pillar->badge }}</span><h3>{{ $pillar->title }}</h3><p>{{ $pillar->summary }}</p><details class="pillar-details"><summary>Como funciona no escopo <span aria-hidden="true">+</span></summary><p>{{ $pillar->details }}</p></details></article>@endif
        @endforeach
    </div><p class="section-caveat">O artigo descreve funções implementadas no cliente Android. Os requisitos e as regras de segurança ainda não foram verificados pelo protocolo formal de testes.</p></div></section>

    <section class="autonomy-section section-wrap"><div class="autonomy-art" aria-hidden="true"><div class="autonomy-orbit orbit-outer"></div><div class="autonomy-orbit orbit-inner"></div><div class="autonomy-core">EU<br><span>escolho</span></div><span class="orbit-tag tag-one">preferências</span><span class="orbit-tag tag-two">apoio</span><span class="orbit-tag tag-three">autonomia</span></div><div class="autonomy-copy"><span class="eyebrow">AUTONOMIA-FIRST</span><h2>O apoio acompanha.<br><em>A escolha continua sua.</em></h2><p>O ORI considera diferentes níveis de autonomia. A distinção entre usuário principal e cuidador organiza permissões, sem presumir incapacidade ou retirar a participação da pessoa nas decisões que lhe dizem respeito.</p><p>Preferências de acessibilidade e participação de cuidadores devem se ajustar a cada pessoa e contexto.</p><a class="inline-arrow" href="#metodologia">Como essa proposta será avaliada <span aria-hidden="true">↘</span></a></div></section>

    <section class="foundations-section section-wrap" id="fundamentos"><x-section-heading number="03" label="FUNDAMENTAÇÃO E ACESSIBILIDADE" meta="CONCEITOS QUE ORIENTAM O DESIGN" />@if($foundations = $record('foundations'))<div class="foundations-layout"><div><span class="eyebrow">{{ $foundations->badge }}</span><h2>{{ $foundations->title }}</h2><p class="foundations-summary">{{ $foundations->summary }}</p><p>{{ $foundations->details }}</p></div><div class="principle-list"><span>PRINCÍPIOS DE DESIGN</span><div><b>01</b> Hierarquia visual clara</div><div><b>02</b> Navegação simplificada</div><div><b>03</b> Menos elementos desnecessários</div><div><b>04</b> Interações previsíveis</div><div><b>05</b> Personalização da interface</div><small>Princípios de projeto não substituem testes com pessoas representativas do público.</small></div></div>@endif</section>

    <section class="architecture-section" id="arquitetura"><div class="section-wrap"><x-section-heading number="04" label="ARQUITETURA E TECNOLOGIAS" meta="RESPONSABILIDADES EM CAMADAS" /><div class="section-title-row"><h2>O mobile e o site<br><em>têm fronteiras claras.</em></h2><p>O sistema Android mantém sua arquitetura própria. O Laravel administra apenas esta plataforma institucional.</p></div>@if($architecture = $record('architecture'))<p class="architecture-intro">{{ $architecture->summary }}</p><div class="architecture-grid"><article class="architecture-layer layer-client"><span>CAMADA 01 · APLICATIVO</span><h3>Android nativo</h3><p>Kotlin · Jetpack Compose · Material 3<br>MVVM · StateFlow · Hilt · Navigation Compose</p><small>Apresentação por módulos e navegação do cliente móvel.</small></article><article class="architecture-layer layer-identity"><span>CAMADA 02 · IDENTIDADE</span><h3>Firebase Authentication</h3><p>Credenciais e autenticação<br>Identificador firebaseUid</p><small>O app não armazena credenciais próprias.</small></article><article class="architecture-layer layer-data"><span>CAMADA 03 · DADOS DO APP</span><h3>Cloud Firestore</h3><p>Rotina · vínculos · CAA · preferências</p><small>Dados de domínio e sincronização do aplicativo.</small></article><article class="architecture-layer layer-security"><span>CAMADA 04 · AUTORIZAÇÃO</span><h3>Firestore Security Rules</h3><p>Permissões de acesso aos dados</p><small>Implementadas no projeto; ainda não testadas.</small></article><article class="architecture-layer layer-functions"><span>CAMADA 05 · LÓGICA DE SERVIDOR</span><h3>Firebase Cloud Functions</h3><p>Node.js · TypeScript</p><small>Projeto inicializado, sem funções implementadas no estágio descrito.</small></article></div><div class="site-boundary"><span class="boundary-mark">↳</span><div><strong>Este site institucional · Laravel 13 · PHP · Blade · Tailwind · SQLite</strong><p>Banco local exclusivamente para contas do site e conteúdos institucionais. Sem conexão com dados pessoais, Firebase Authentication ou Firestore do app.</p></div></div>@endif</div></section>

    <section class="method-section section-wrap" id="metodologia"><x-section-heading number="05" label="METODOLOGIA E AVALIAÇÃO" meta="PESQUISA APLICADA · EXPLORATÓRIA · DESCRITIVA" /><div class="method-layout">@if($methodology = $record('methodology'))<div><span class="eyebrow">{{ $methodology->badge }}</span><h2>Da pesquisa<br>à <em>validação.</em></h2><p>{{ $methodology->summary }}</p><p>{{ $methodology->details }}</p></div>@endif<div class="method-steps"><div><span>01</span><strong>Levantamento bibliográfico</strong></div><div><span>02</span><strong>Análise documental</strong></div><div><span>03</span><strong>Requisitos e modelagem</strong></div><div><span>04</span><strong>Prototipação no Figma</strong></div><div><span>05</span><strong>Desenvolvimento Android</strong></div><div class="step-pending"><span>06</span><strong>Avaliação funcional planejada</strong><small>Não executada no estágio descrito no artigo</small></div></div></div></section>

    <section class="status-section" id="pesquisa"><div class="section-wrap status-layout"><div class="status-main"><x-section-heading number="06" label="ESTÁGIO ATUAL" meta="9º ENGETEC · 2026" /><span class="eyebrow">IMPLEMENTADO NO CLIENTE ANDROID, AINDA NÃO VERIFICADO EM TESTES</span>@if($status = $record('team-status'))<h2>{{ $status->title }}</h2><p class="status-lead">{{ $status->summary }}</p><div class="status-source-note"><span class="eyebrow">ARTIGO, README E REPOSITÓRIO</span><p>{{ $status->details }}</p></div>@endif<a class="button button-acid" href="https://github.com/MatheusMendoncaLima/ori" target="_blank" rel="noopener noreferrer">Abrir repositório no GitHub <span aria-hidden="true">↗</span></a></div><aside class="status-aside"><span class="eyebrow">LIMITES DO QUE SABEMOS</span><div class="status-count">0<span> resultados de teste<br>reportados pelo artigo</span></div><p>O protocolo funcional interno ainda não foi executado. Não há conclusões apresentadas sobre desempenho, usabilidade, acessibilidade efetiva ou ganho de autonomia.</p><div class="test-status"><span>STATUS</span><strong><i></i> A VALIDAR</strong></div></aside></div></section>

    @php($teamMembers = [
        ['name' => 'Mariana dos Santos Moreira', 'role' => 'DESENVOLVIMENTO', 'photo' => 'mariana-dos-santos-moreira.jpg'],
        ['name' => 'Matheus Mendonça de Lima', 'role' => 'DESENVOLVIMENTO', 'photo' => 'matheus-mendonca-de-lima.jpg'],
        ['name' => 'Nicollas Lopes Costa', 'role' => 'DESENVOLVIMENTO', 'photo' => 'nicollas-lopes-costa.jpg'],
    ])
    <section class="team-section section-wrap" id="equipe"><x-section-heading number="07" label="EQUIPE E CONTEXTO ACADÊMICO" meta="ETEC ZONA LESTE · AMS · P-TECH" /><div class="team-title-row"><h2>Construído<br><em>em equipe.</em></h2><p>Desenvolvimento de Sistemas<br>Parceria institucional com a IBM</p></div><div class="team-grid">
        @foreach ($teamMembers as $member)
            @php($photoPath = public_path('images/team/'.$member['photo']))
            <article><div class="team-photo-placeholder {{ file_exists($photoPath) ? 'has-photo' : '' }}" role="img" aria-label="{{ file_exists($photoPath) ? 'Foto de ' : 'Espaço reservado para foto de ' }}{{ $member['name'] }}">@if (file_exists($photoPath))<img src="{{ asset('images/team/'.$member['photo']) }}" alt="">@else<span>foto da equipe</span>@endif</div><h3>{{ $member['name'] }}</h3><span>{{ $member['role'] }}</span></article>
        @endforeach
    </div></section>

    <section class="scope-section"><div class="section-wrap scope-layout"><div><span class="eyebrow">ESCOPO DO MVP</span><h2>O que ficou<br><em>para depois.</em></h2></div><div><p>Para manter o protótipo focado nas funções essenciais e reduzir complexidade técnica e ética, estes recursos estão explicitamente fora do MVP:</p><div class="excluded-list"><span>Geração de rotinas por IA</span><span>Monitoramento avançado de comportamento</span><span>Diagnóstico e acompanhamento clínico</span><span>Gamificação</span><span>Relatórios complexos</span><span>Notificações avançadas</span></div></div></div></section>

    <section class="references-section section-wrap" id="referencias"><x-section-heading number="08" label="REFERÊNCIAS BIBLIOGRÁFICAS" meta="FONTES DO ARTIGO CIENTÍFICO" /><div class="references-layout"><h2>Uma conversa<br>com <em>outras pesquisas.</em></h2><ol class="reference-list">@foreach($references as [$citation, $url])<li><p>{{ $citation }}</p>@if($url)<a href="{{ $url }}" target="_blank" rel="noopener noreferrer">{{ str_starts_with($url, 'https://doi.org/') ? str_replace('https://doi.org/', 'doi: ', $url) : $url }} <span aria-hidden="true">↗</span></a>@endif</li>@endforeach</ol></div></section>

    <section class="closing-section"><div class="closing-shape" aria-hidden="true"></div><p class="eyebrow">ORI · TECNOLOGIA ASSISTIVA</p><h2>Um cotidiano<br>com mais <em>possibilidades.</em></h2><a class="button button-dark btn btn-primary" href="#inicio">Voltar ao início <span aria-hidden="true">↑</span></a></section>
</main>
<footer class="site-footer"><x-ori-brand href="#inicio" /><p>Projeto acadêmico · ETEC Zona Leste<br>Desenvolvimento de Sistemas · AMS · P-Tech</p><a href="https://github.com/MatheusMendoncaLima/ori" target="_blank" rel="noopener noreferrer">Repositório oficial <span aria-hidden="true">↗</span></a><span>© ORI · 2026</span></footer>
@endsection

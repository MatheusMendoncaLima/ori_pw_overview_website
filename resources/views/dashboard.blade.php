<x-app-layout>
    <x-slot name="header">
        <div class="ori-dashboard-heading">
            <div class="dashboard-breadcrumb"><span>ORI</span><span aria-hidden="true">/</span><span>Área institucional</span></div>
            <div class="dashboard-heading-row">
                <div>
                    <p class="eyebrow">SEU ESPAÇO DE ADMINISTRAÇÃO</p>
                    <h1>Olá, {{ auth()->user()->name }}.</h1>
                    <p class="dashboard-heading-copy">Acompanhe e organize as informações públicas do projeto.</p>
                </div>
                <span class="role-tag badge badge-outline">{{ $roleLabels[auth()->user()->role] ?? 'Conta do site' }}</span>
            </div>
        </div>
    </x-slot>

    <main class="ori-dashboard-page">
        <section class="dashboard-welcome-card card bg-base-100">
            <div class="dashboard-welcome-copy">
                <span class="dashboard-card-kicker">ORGANIZAR · COMUNICAR · CUIDAR</span>
                <h2>Conteúdo claro,<br><em>projeto bem cuidado.</em></h2>
                <p>Este painel administra somente as informações institucionais deste site. Os dados pessoais e os recursos do aplicativo móvel continuam separados.</p>
            </div>
            <div class="dashboard-welcome-mark" aria-hidden="true"><img src="{{ asset('images/ori-logo.svg') }}" alt=""></div>
        </section>

        @if(auth()->user()->role === 'admin')
            <section class="dashboard-overview" aria-labelledby="dashboard-overview-title">
                <div class="dashboard-section-heading">
                    <div><p class="eyebrow">VISÃO GERAL</p><h2 id="dashboard-overview-title">O site em números</h2></div>
                    <a class="dashboard-inline-link" href="{{ route('admin.contents.index') }}">Ver todos os conteúdos <span aria-hidden="true">→</span></a>
                </div>
                <div class="dashboard-stat-grid">
                    <article class="dashboard-stat-card stat stat-total"><span class="dashboard-stat-label stat-title">Conteúdos cadastrados</span><strong class="stat-value">{{ $statistics['total'] }}</strong><small class="stat-desc">Itens no painel institucional</small></article>
                    <article class="dashboard-stat-card stat stat-active"><span class="dashboard-stat-label stat-title">Ativos no site</span><strong class="stat-value">{{ $statistics['active'] }}</strong><small class="stat-desc">Visíveis para quem visita</small></article>
                    <article class="dashboard-stat-card stat stat-inactive"><span class="dashboard-stat-label stat-title">Inativos</span><strong class="stat-value">{{ $statistics['inactive'] }}</strong><small class="stat-desc">Salvos no painel, fora do site</small></article>
                </div>
            </section>

            <section class="dashboard-shortcuts" aria-labelledby="dashboard-shortcuts-title">
                <div class="dashboard-section-heading"><div><p class="eyebrow">ATALHOS</p><h2 id="dashboard-shortcuts-title">O que você deseja fazer?</h2></div></div>
                <div class="dashboard-action-grid">
                    <a class="dashboard-action-card card bg-base-100 action-content" href="{{ route('admin.contents.index') }}"><span class="action-card-mark" aria-hidden="true">01</span><span class="action-card-copy"><strong>Gerenciar conteúdo</strong><small>Editar textos, seções e visibilidade da página institucional.</small></span><span class="action-card-arrow" aria-hidden="true">→</span></a>
                    <a class="dashboard-action-card card bg-base-100 action-profile" href="{{ route('profile.edit') }}"><span class="action-card-mark" aria-hidden="true">02</span><span class="action-card-copy"><strong>Meu perfil</strong><small>Atualizar seus dados de acesso e as preferências da conta.</small></span><span class="action-card-arrow" aria-hidden="true">→</span></a>
                    <a class="dashboard-action-card card bg-base-100 action-public" href="{{ route('home') }}"><span class="action-card-mark" aria-hidden="true">03</span><span class="action-card-copy"><strong>Ver site público</strong><small>Conferir como as informações aparecem para visitantes.</small></span><span class="action-card-arrow" aria-hidden="true">↗</span></a>
                </div>
            </section>
        @else
            <section class="dashboard-member-card">
                <span class="dashboard-card-kicker">SUA CONTA</span>
                <h2>Seu perfil do site</h2>
                <p>Você pode atualizar seus dados de acesso. A edição dos conteúdos institucionais é reservada a administradores.</p>
                <a class="dashboard-primary-action btn btn-primary" href="{{ route('profile.edit') }}">Abrir meu perfil <span aria-hidden="true">→</span></a>
            </section>
        @endif

        <aside class="dashboard-note alert alert-info"><span class="dashboard-note-mark" aria-hidden="true">i</span><p>O painel não acessa contas, rotinas ou dados pessoais do aplicativo ORI. Ele mantém apenas contas do site e conteúdos institucionais em seu banco local.</p></aside>
    </main>
</x-app-layout>
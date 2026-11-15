<x-app-layout>
    <x-slot name="header">
        <div class="dashboard-title-row"><div><p class="eyebrow">ESPAÇO DO SITE INSTITUCIONAL</p><h1 class="text-3xl font-extrabold tracking-tight text-[#102A45]">Olá, {{ auth()->user()->name }}.</h1></div><span class="role-tag">{{ $roleLabels[auth()->user()->role] ?? 'Conta do site' }}</span></div>
    </x-slot>
    <main class="mx-auto max-w-7xl px-5 py-12 sm:px-8">
        <div class="rounded-3xl bg-white p-8 shadow-sm ring-1 ring-[#E5F0FA]"><p class="eyebrow">ORI · PAINEL</p><h2 class="mt-3 text-2xl font-bold text-[#102A45]">Bem-vindo à área autenticada.</h2><p class="mt-3 max-w-2xl text-[#546E85]">Este acesso administra somente o conteúdo institucional e as contas deste site. A autenticação, as rotinas e os dados pessoais do aplicativo móvel permanecem nos serviços Firebase do ORI Android.</p>
            @if(auth()->user()->role === 'admin')
                <div class="mt-8 grid gap-4 sm:grid-cols-3">@foreach(['Conteúdos cadastrados' => $statistics['total'], 'Ativos no site' => $statistics['active'], 'Inativos' => $statistics['inactive']] as $label => $value)<div class="stat-card"><span>{{ $label }}</span><strong>{{ $value }}</strong></div>@endforeach</div>
                <a class="mt-8 inline-flex items-center gap-3 rounded-full bg-[#102A45] px-6 py-3 font-bold text-white transition hover:bg-[#0F6E72]" href="{{ route('admin.contents.index') }}">Gerenciar conteúdo <span aria-hidden="true">↗</span></a>
            @else
                <p class="mt-7 rounded-2xl bg-[#FFF7DC] px-5 py-4 text-sm text-[#102A45]">Sua conta tem acesso ao perfil do site. O gerenciamento de conteúdo é reservado a administradores.</p>
            @endif
        </div>
    </main>
</x-app-layout>

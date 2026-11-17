<x-app-layout>
    @php($muted = 'text-base-content/70')
    <x-slot name="header">
        <div class="flex flex-wrap items-end justify-between gap-4">
            <div><x-eyebrow>Conteúdo institucional</x-eyebrow><h1 class="font-brand text-3xl font-extrabold tracking-tight">O que o site conta.</h1></div>
            <a class="btn btn-primary" href="{{ route('admin.contents.create') }}">Adicionar conteúdo <span aria-hidden="true">＋</span></a>
        </div>
    </x-slot>
    <div class="mx-auto max-w-7xl px-4 py-10 sm:px-6 lg:px-8">
        @if(session('status'))<div class="alert alert-success mb-6 rounded-xl text-sm font-semibold" role="status">{{ session('status') }}</div>@endif
        <div class="mb-9 grid gap-4 sm:grid-cols-3">
            @foreach(['Total de conteúdos' => $statistics['total'], 'Ativos' => $statistics['active'], 'Inativos' => $statistics['inactive']] as $label => $value)
                <div class="rounded-[20px] border border-base-300 bg-base-100 p-5"><span class="text-sm font-bold {{ $muted }}">{{ $label }}</span><strong class="block font-brand text-4xl font-black">{{ $value }}</strong></div>
            @endforeach
        </div>
        <div class="mb-4 flex flex-wrap items-end justify-between gap-3">
            <div><h2 class="font-brand text-xl font-extrabold">Registros cadastrados</h2><p class="mt-1 text-sm {{ $muted }}">O conteúdo inativo fica disponível neste painel e oculto no site público.</p></div>
            <span class="text-xs font-bold uppercase tracking-wider {{ $muted }}">{{ $contents->total() }} registros</span>
        </div>
        <div class="overflow-hidden rounded-[20px] border border-base-300 bg-base-100">
            <div class="hidden grid-cols-[minmax(0,1.5fr)_minmax(130px,1fr)_90px_100px_140px] gap-4 border-b border-base-300 bg-base-200 px-6 py-3 text-xs font-bold uppercase tracking-wider {{ $muted }} md:grid"><span>Conteúdo</span><span>Seção</span><span>Ordem</span><span>Situação</span><span class="text-right">Ações</span></div>
            @forelse($contents as $content)
                <article class="grid items-center gap-3 border-b border-base-300 px-6 py-4 last:border-b-0 md:grid-cols-[minmax(0,1.5fr)_minmax(130px,1fr)_90px_100px_140px] md:gap-4">
                    <div>
                        <span class="mb-1 block text-[10px] font-bold uppercase tracking-[.14em] text-success md:hidden">{{ $sections[$content->section] ?? $content->section }}</span>
                        <h3 class="font-bold">{{ $content->title }}</h3>
                        <p class="mt-1 line-clamp-2 text-sm {{ $muted }}">{{ $content->summary }}</p>
                    </div>
                    <span class="hidden text-sm {{ $muted }} md:block">{{ $sections[$content->section] ?? $content->section }}</span>
                    <span class="hidden text-sm tabular-nums {{ $muted }} md:block">{{ $content->display_order }}</span>
                    <span class="badge gap-2 font-bold {{ $content->is_active ? 'badge-success' : 'badge-ghost' }}">{{ $content->is_active ? 'Ativo' : 'Inativo' }}</span>
                    <div class="flex gap-2 md:justify-end"><a class="btn btn-outline btn-xs" href="{{ route('admin.contents.show', $content) }}">Ver</a><a class="btn btn-primary btn-xs" href="{{ route('admin.contents.edit', $content) }}">Editar</a></div>
                </article>
            @empty
                <div class="p-12 text-center"><h3 class="font-bold">Nenhum conteúdo cadastrado.</h3><p class="mt-1 text-sm {{ $muted }}">Crie um novo item institucional para começar.</p></div>
            @endforelse
        </div>
        <div class="mt-6">{{ $contents->links() }}</div>
    </div>
</x-app-layout>

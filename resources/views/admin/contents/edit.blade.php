@extends('layouts.institutional')
@section('title', 'Editar conteúdo · Painel ORI')
@section('content')
@include('admin.contents._editor-header')
<main id="main" class="mx-auto max-w-4xl px-6 pb-20 pt-6">
    <x-eyebrow>ORI · Administração · {{ $content->is_active ? 'Publicado' : 'Rascunho' }}</x-eyebrow>
    <h1 class="mt-2 font-brand text-4xl font-extrabold leading-tight sm:text-5xl">Editar<br><em class="not-italic text-primary">conteúdo.</em></h1>
    <p class="mt-3 max-w-xl text-base-content/70">As alterações aparecem no site público quando este registro estiver ativo.</p>
    @if($errors->any())<div class="alert alert-error mt-6 rounded-2xl" role="alert"><div><strong>Não foi possível salvar ainda.</strong><p class="text-sm">Revise os campos com erro abaixo.</p></div></div>@endif
    @include('admin.contents._form', ['action' => route('admin.contents.update', $content), 'method' => 'PUT', 'submitLabel' => 'Salvar alterações'])
    <form class="mt-10 border-t border-base-300 pt-6" method="post" action="{{ route('admin.contents.destroy', $content) }}" data-confirm="Excluir este conteúdo? Esta ação não pode ser desfeita.">@csrf @method('DELETE')<button class="btn btn-outline btn-error btn-sm" type="submit">Excluir este conteúdo</button></form>
</main>
@endsection

@extends('layouts.institutional')
@section('title', 'Editar conteúdo · Painel ORI')
@section('content')
<header class="editor-header"><x-ori-brand :href="route('dashboard')" caption="Painel institucional" /><a class="quiet-link" href="{{ route('admin.contents.index') }}">← Voltar aos conteúdos</a></header>
<main class="editor-page"><p class="eyebrow">ORI · ADMINISTRAÇÃO · {{ $content->is_active ? 'PUBLICADO' : 'RASCUNHO' }}</p><h1>Editar<br><em>conteúdo.</em></h1><p class="editor-intro">As alterações aparecem no site público quando este registro estiver ativo.</p>
@if($errors->any())<div class="error-banner" role="alert"><strong>Não foi possível salvar ainda.</strong><p>Revise os campos com erro abaixo.</p></div>@endif
@include('admin.contents._form', ['action' => route('admin.contents.update', $content), 'method' => 'PUT', 'submitLabel' => 'Salvar alterações'])
<form class="delete-record" method="post" action="{{ route('admin.contents.destroy', $content) }}" data-confirm="Excluir este conteúdo? Esta ação não pode ser desfeita.">@csrf @method('DELETE')<button type="submit">Excluir este conteúdo</button></form>
</main>
@endsection

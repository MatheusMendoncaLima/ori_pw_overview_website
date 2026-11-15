@extends('layouts.institutional')
@section('title', 'Novo conteúdo · Painel ORI')
@section('content')
<header class="editor-header"><x-ori-brand :href="route('dashboard')" caption="Painel institucional" /><a class="quiet-link" href="{{ route('admin.contents.index') }}">← Voltar aos conteúdos</a></header>
<main class="editor-page"><p class="eyebrow">ORI · ADMINISTRAÇÃO</p><h1>Adicionar<br><em>conteúdo.</em></h1><p class="editor-intro">Novas informações passam a integrar o painel e, se publicadas, o site institucional.</p>
@if($errors->any())<div class="error-banner" role="alert"><strong>Não foi possível salvar ainda.</strong><p>Revise os campos com erro abaixo.</p></div>@endif
@include('admin.contents._form', ['action' => route('admin.contents.store'), 'method' => 'POST', 'submitLabel' => 'Criar conteúdo'])
</main>
@endsection

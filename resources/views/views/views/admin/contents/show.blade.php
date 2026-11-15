@extends('layouts.institutional')
@section('title', $content->title.' · Painel ORI')
@section('content')
<header class="editor-header"><x-ori-brand :href="route('dashboard')" caption="Painel institucional" /><a class="quiet-link" href="{{ route('admin.contents.index') }}">← Voltar aos conteúdos</a></header>
<main class="editor-page detail-page"><p class="eyebrow">{{ $sections[$content->section] ?? $content->section }} · ORDEM {{ $content->display_order }}</p><span class="status-badge {{ $content->is_active ? 'status-active' : 'status-inactive' }}"><i></i>{{ $content->is_active ? 'Ativo no site' : 'Inativo no site' }}</span><h1>{{ $content->title }}</h1>@if($content->badge)<span class="content-badge">{{ $content->badge }}</span>@endif<h2>{{ $content->summary }}</h2>@if($content->details)<div class="content-details">{{ $content->details }}</div>@endif<div class="form-actions"><a class="button button-dark" href="{{ route('admin.contents.edit', $content) }}">Editar conteúdo <span aria-hidden="true">↗</span></a><a href="{{ route('admin.contents.index') }}" class="quiet-link">Voltar à listagem</a></div></main>
@endsection

@extends('layouts.institutional')
@section('title', $content->title.' · Painel ORI')
@section('content')
@include('admin.contents._editor-header')
<main id="main" class="mx-auto max-w-4xl px-6 pb-20 pt-6">
    <x-eyebrow>{{ $sections[$content->section] ?? $content->section }} · Ordem {{ $content->display_order }}</x-eyebrow>
    <div class="mt-3"><span class="badge badge-lg gap-2 font-bold {{ $content->is_active ? 'badge-success' : 'badge-ghost' }}">{{ $content->is_active ? 'Ativo no site' : 'Inativo no site' }}</span></div>
    <h1 class="mt-4 font-brand text-4xl font-extrabold leading-tight sm:text-5xl">{{ $content->title }}</h1>
    @if($content->badge)<span class="mt-3 inline-block rounded-full border border-base-300 bg-base-100 px-3 py-1 text-xs font-bold">{{ $content->badge }}</span>@endif
    <h2 class="mt-6 text-xl font-bold leading-snug">{{ $content->summary }}</h2>
    @if($content->details)<div class="mt-4 whitespace-pre-line rounded-[20px] border border-base-300 bg-base-100 p-6 text-base-content/80">{{ $content->details }}</div>@endif
    <div class="mt-8 flex flex-wrap items-center gap-4"><a class="btn btn-primary min-h-[52px]" href="{{ route('admin.contents.edit', $content) }}">Editar conteúdo <span aria-hidden="true">↗</span></a><a class="font-bold underline underline-offset-4" href="{{ route('admin.contents.index') }}">Voltar à listagem</a></div>
</main>
@endsection

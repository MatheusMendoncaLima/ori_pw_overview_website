@extends('layouts.institutional')
@section('title', 'Novo conteúdo · Painel ORI')
@section('content')
@include('admin.contents._editor-header')
<main id="main" class="mx-auto max-w-4xl px-6 pb-20 pt-6">
    <x-eyebrow>ORI · Administração</x-eyebrow>
    <h1 class="mt-2 font-brand text-4xl font-extrabold leading-tight sm:text-5xl">Adicionar<br><em class="not-italic text-primary">conteúdo.</em></h1>
    <p class="mt-3 max-w-xl text-base-content/70">Novas informações passam a integrar o painel e, se publicadas, o site institucional.</p>
    @if($errors->any())<div class="alert alert-error mt-6 rounded-2xl" role="alert"><div><strong>Não foi possível salvar ainda.</strong><p class="text-sm">Revise os campos com erro abaixo.</p></div></div>@endif
    @include('admin.contents._form', ['action' => route('admin.contents.store'), 'method' => 'POST', 'submitLabel' => 'Criar conteúdo'])
</main>
@endsection

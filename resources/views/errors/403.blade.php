@extends('layouts.institutional')
@section('title', 'Acesso restrito · ORI')
@section('content')
<main id="main" class="mx-auto grid min-h-screen max-w-3xl content-center justify-items-start gap-4 px-6 py-16">
    <span class="font-brand text-8xl font-black text-primary">403</span>
    <x-eyebrow>ORI · Acesso restrito</x-eyebrow>
    <h1 class="font-brand text-4xl font-extrabold leading-tight sm:text-5xl">Esta área é<br><em class="not-italic text-primary">administrativa.</em></h1>
    <p class="text-base-content/70">Esta conta não tem permissão para gerenciar o conteúdo institucional.</p>
    <a class="btn btn-primary mt-2 min-h-[52px]" href="{{ route('home') }}">Voltar à página inicial <span aria-hidden="true">↗</span></a>
</main>
@endsection

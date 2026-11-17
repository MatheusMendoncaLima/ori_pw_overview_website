@extends('layouts.institutional')
@section('title', 'Página não encontrada · ORI')
@section('content')
<main id="main" class="mx-auto grid min-h-screen max-w-3xl content-center justify-items-start gap-4 px-6 py-16">
    <span class="font-brand text-8xl font-black text-primary">404</span>
    <x-eyebrow>ORI · Página não encontrada</x-eyebrow>
    <h1 class="font-brand text-4xl font-extrabold leading-tight sm:text-5xl">Este caminho<br><em class="not-italic text-primary">não existe.</em></h1>
    <p class="text-base-content/70">O endereço pode ter sido alterado ou digitado incorretamente.</p>
    <a class="btn btn-primary mt-2 min-h-[52px]" href="{{ route('home') }}">Voltar à página inicial <span aria-hidden="true">↗</span></a>
</main>
@endsection

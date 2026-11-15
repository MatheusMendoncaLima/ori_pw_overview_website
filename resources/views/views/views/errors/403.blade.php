@extends('layouts.institutional')
@section('title', 'Acesso restrito · ORI')
@section('content')
<main class="error-page"><span class="error-number">403</span><p class="eyebrow">ORI · ACESSO RESTRITO</p><h1>Esta área é<br><em>administrativa.</em></h1><p>Esta conta não tem permissão para gerenciar o conteúdo institucional.</p><a class="button button-dark" href="{{ route('home') }}">Voltar à página inicial <span aria-hidden="true">↗</span></a></main>
@endsection

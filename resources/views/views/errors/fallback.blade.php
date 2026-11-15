@extends('layouts.institutional')
@section('title', 'Página não encontrada · ORI')
@section('content')
<main class="error-page"><span class="error-number">404</span><p class="eyebrow">ORI · PÁGINA NÃO ENCONTRADA</p><h1>Este caminho<br><em>não existe.</em></h1><p>O endereço pode ter sido alterado ou digitado incorretamente.</p><a class="button button-dark" href="{{ route('home') }}">Voltar à página inicial <span aria-hidden="true">↗</span></a></main>
@endsection

<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1"><meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Acesso ORI')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=DM+Mono:wght@400;500&family=Nunito+Sans:wght@400;500;600;700;800&family=Nunito:wght@700;800;900&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="guest-page">
    <a class="skip-link" href="#auth-content">Pular para o formulário</a>
    <header class="guest-header"><x-ori-brand :href="route('home')" /><a href="{{ route('home') }}" class="quiet-link">← Voltar ao site</a></header>
    <main id="auth-content" class="guest-grid"><section class="guest-visual"><span class="eyebrow">PLATAFORMA INSTITUCIONAL · ORI</span><h1>O conteúdo<br>também <em>evolui.</em></h1><p>Entre para atualizar as informações institucionais do projeto.</p><div class="guest-art"><span class="guest-orbit orbit-g1"></span><span class="guest-orbit orbit-g2"></span><span class="guest-orbit-text">ROTINA<br>COM AUTONOMIA</span><span class="guest-art-mark">o<span>r</span>i</span><span class="guest-art-star">✳</span></div></section><section class="guest-form-panel"><span class="eyebrow">ÁREA RESTRITA · {{ request()->routeIs('register') ? 'NOVA CONTA' : 'ACESSO' }}</span>@yield('content'){{ $slot ?? '' }}</section></main>
</body></html>

<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#F2FAFE">
    <meta name="description" content="ORI: plataforma móvel modular de tecnologia assistiva para rotina, comunicação aumentativa e alternativa e acessibilidade, desenvolvida com foco na autonomia.">
    <title>@yield('title', 'ORI · tecnologia assistiva com autonomia')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Mono:wght@400;500&family=Nunito+Sans:wght@400;500;600;700;800&family=Nunito:wght@700;800;900&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="public-body">
    <a class="skip-link" href="#main">Pular para o conteúdo</a>
    @yield('content')
</body>
</html>

@extends('layouts.guest')
@section('title', 'Redefinir senha · ORI')
@section('content')
<h2>Vamos recuperar<br><em>o acesso.</em></h2><p class="auth-intro">Informe seu e-mail para receber um link de redefinição de senha.</p><x-auth-session-status class="auth-status" :status="session('status')" />
<form method="post" action="{{ route('password.email') }}" class="auth-form">@csrf<div><x-input-label for="email" value="E-mail" /><x-text-input id="email" class="auth-input" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" /><x-input-error :messages="$errors->get('email')" class="field-error" /></div><div class="auth-actions"><button class="button button-dark" type="submit">Enviar link <span aria-hidden="true">↗</span></button><a href="{{ route('login') }}">Voltar ao acesso</a></div></form>
@endsection

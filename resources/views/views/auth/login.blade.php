@extends('layouts.guest')
@section('title', 'Entrar · ORI')
@section('content')
<x-auth-session-status class="auth-status" :status="session('status')" />
<h2>Entre na sua<br><em>conta.</em></h2><p class="auth-intro">Acesse o painel e gerencie seu perfil institucional.</p>
<form method="post" action="{{ route('login') }}" class="auth-form">@csrf
    <div><x-input-label for="email" value="E-mail" /><x-text-input id="email" class="auth-input" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" /><x-input-error :messages="$errors->get('email')" class="field-error" /></div>
    <div><x-input-label for="password" value="Senha" /><x-text-input id="password" class="auth-input" type="password" name="password" required autocomplete="current-password" /><x-input-error :messages="$errors->get('password')" class="field-error" /></div>
    <label class="auth-check"><input id="remember_me" type="checkbox" name="remember"><span>Manter conectado</span></label>
    <div class="auth-actions"><button class="button button-dark" type="submit">Entrar <span aria-hidden="true">↗</span></button><a href="{{ route('password.request') }}">Esqueci minha senha</a></div>
</form>
<p class="auth-register">Ainda não tem conta? <a href="{{ route('register') }}">Criar conta</a></p>
@endsection

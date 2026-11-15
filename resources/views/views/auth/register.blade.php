@extends('layouts.guest')
@section('title', 'Criar conta · ORI')
@section('content')
<h2>Crie uma<br><em>conta.</em></h2><p class="auth-intro">O cadastro cria uma conta comum para este site institucional.</p>
<form method="post" action="{{ route('register') }}" class="auth-form">@csrf
    <div><x-input-label for="name" value="Nome" /><x-text-input id="name" class="auth-input" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" /><x-input-error :messages="$errors->get('name')" class="field-error" /></div>
    <div><x-input-label for="email" value="E-mail" /><x-text-input id="email" class="auth-input" type="email" name="email" :value="old('email')" required autocomplete="username" /><x-input-error :messages="$errors->get('email')" class="field-error" /></div>
    <div><x-input-label for="password" value="Senha" /><x-text-input id="password" class="auth-input" type="password" name="password" required autocomplete="new-password" /><x-input-error :messages="$errors->get('password')" class="field-error" /></div>
    <div><x-input-label for="password_confirmation" value="Confirme a senha" /><x-text-input id="password_confirmation" class="auth-input" type="password" name="password_confirmation" required autocomplete="new-password" /><x-input-error :messages="$errors->get('password_confirmation')" class="field-error" /></div>
    <div class="auth-actions"><button class="button button-dark" type="submit">Criar conta <span aria-hidden="true">↗</span></button><a href="{{ route('login') }}">Já tem uma conta? Entrar</a></div>
</form>
@endsection

@extends('layouts.guest')
@section('title', 'Entrar · ori')
@section('content')
<x-auth-session-status class="mb-5 rounded-[14px] border border-[#B8DCC0] bg-[#EAF8EC] px-4 py-3 text-sm font-bold text-[#2E7D32] dark:border-[#315B3D] dark:bg-[#20442D] dark:text-[#86C79A]" :status="session('status')" />

<h1 class="font-sans text-[32px] font-extrabold leading-[1.2] text-[#102A45] dark:text-[#E4EDF4]">Olá!</h1>
<p class="mt-2 text-[15px] leading-[1.4] text-[#546E85] dark:text-[#A7B9C8]">Entre para atualizar as informações institucionais do ori.</p>

<form method="post" action="{{ route('login') }}" class="mt-5 space-y-4">@csrf
    <div>
        <x-input-label for="email" value="E-mail" class="text-sm font-bold text-[#102A45] dark:text-[#E4EDF4]" />
        <x-text-input id="email" class="mt-2 block h-[52px] w-full rounded-[14px] border border-[#7A8C9C] bg-white px-4 text-[15px] text-[#102A45] placeholder:text-[#5C768D] focus:border-[#0082A3] focus:ring-2 focus:ring-[#D2E6F5] dark:bg-[#142230] dark:text-[#E4EDF4]" type="email" name="email" :value="old('email')" placeholder="seu@email.com" required autofocus autocomplete="username" />
        <x-input-error :messages="$errors->get('email')" class="mt-2 space-y-1 text-sm font-semibold text-[#D32F2F] dark:text-[#F2A29B]" />
    </div>
    <div>
        <x-input-label for="password" value="Senha" class="text-sm font-bold text-[#102A45] dark:text-[#E4EDF4]" />
        <x-text-input id="password" class="mt-2 block h-[52px] w-full rounded-[14px] border border-[#7A8C9C] bg-white px-4 text-[15px] text-[#102A45] placeholder:text-[#5C768D] focus:border-[#0082A3] focus:ring-2 focus:ring-[#D2E6F5] dark:bg-[#142230] dark:text-[#E4EDF4]" type="password" name="password" placeholder="••••••••" required autocomplete="current-password" />
        <x-input-error :messages="$errors->get('password')" class="mt-2 space-y-1 text-sm font-semibold text-[#D32F2F] dark:text-[#F2A29B]" />
    </div>

    <label for="remember_me" class="flex min-h-10 cursor-pointer items-center gap-3 text-sm font-bold text-[#102A45] dark:text-[#E4EDF4]">
        <input id="remember_me" type="checkbox" name="remember" class="h-5 w-5 rounded border-[#7A8C9C] text-[#0082A3] focus:ring-2 focus:ring-[#D2E6F5]">
        <span>Manter conectado</span>
    </label>

    <div class="space-y-3 pt-1">
        <button class="inline-flex min-h-[52px] w-full items-center justify-center rounded-full bg-[#0082A3] px-6 text-base font-extrabold text-white transition-colors hover:bg-[#006C89] focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-[#102A45]" type="submit">Entrar</button>
        <a class="flex min-h-10 items-center justify-center rounded-full text-sm font-bold text-[#102A45] underline decoration-[#7A8C9C] underline-offset-4 hover:text-[#0082A3] focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-[#0082A3] dark:text-[#E4EDF4]" href="{{ route('password.request') }}">Esqueci minha senha</a>
    </div>
</form>

<div class="mt-3 border-t border-[#E5F0FA] pt-3 dark:border-[#243849]">
    <p class="mb-2 text-center text-sm text-[#546E85] dark:text-[#A7B9C8] md:hidden">Ainda não tem conta?</p>
    <a class="flex min-h-12 w-full items-center justify-center rounded-full border border-[#7A8C9C] bg-white px-5 text-sm font-bold text-[#102A45] transition-colors hover:bg-[#E6F1FC] focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-[#0082A3] md:hidden dark:bg-[#142230] dark:text-[#E4EDF4] dark:hover:bg-[#1C2E3F]" href="{{ route('register') }}">Criar uma conta</a>
    <p class="hidden text-center text-sm text-[#546E85] dark:text-[#A7B9C8] md:block">Ainda não tem conta? <a class="font-bold text-[#0082A3] underline underline-offset-4 hover:text-[#006C89]" href="{{ route('register') }}">Criar uma conta</a></p>
</div>
@endsection

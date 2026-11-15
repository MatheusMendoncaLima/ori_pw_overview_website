@extends('layouts.guest')
@section('title', 'Redefinir senha · ori')
@section('content')
<h1 class="font-sans text-[30px] font-extrabold leading-[1.2] text-[#102A45] dark:text-[#E4EDF4]">Recuperar acesso</h1>
<p class="mt-2 text-[15px] leading-[1.4] text-[#546E85] dark:text-[#A7B9C8]">Informe seu e-mail para receber um link de redefinição de senha.</p>
<x-auth-session-status class="mt-5 rounded-[14px] border border-[#B8DCC0] bg-[#EAF8EC] px-4 py-3 text-sm font-bold text-[#2E7D32] dark:border-[#315B3D] dark:bg-[#20442D] dark:text-[#86C79A]" :status="session('status')" />
<form method="post" action="{{ route('password.email') }}" class="mt-7 space-y-5">@csrf
    <div>
        <x-input-label for="email" value="E-mail" class="text-sm font-bold text-[#102A45] dark:text-[#E4EDF4]" />
        <x-text-input id="email" class="mt-2 block h-[52px] w-full rounded-[14px] border border-[#7A8C9C] bg-white px-4 text-[15px] text-[#102A45] placeholder:text-[#5C768D] focus:border-[#0082A3] focus:ring-2 focus:ring-[#D2E6F5] dark:bg-[#142230] dark:text-[#E4EDF4]" type="email" name="email" :value="old('email')" placeholder="seu@email.com" required autofocus autocomplete="username" />
        <x-input-error :messages="$errors->get('email')" class="mt-2 space-y-1 text-sm font-semibold text-[#D32F2F] dark:text-[#F2A29B]" />
    </div>
    <button class="inline-flex min-h-[52px] w-full items-center justify-center gap-3 rounded-full bg-[#0082A3] px-6 text-base font-extrabold text-white transition-colors hover:bg-[#006C89] focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-[#102A45]" type="submit">Enviar link</button>
    <a class="flex min-h-12 items-center justify-center text-sm font-bold text-[#102A45] underline decoration-[#7A8C9C] underline-offset-4 hover:text-[#0082A3] dark:text-[#E4EDF4]" href="{{ route('login') }}">Voltar ao acesso</a>
</form>
@endsection

@extends('layouts.guest')
@section('title', 'Nova senha · ori')
@section('content')
<h1 class="font-sans text-[30px] font-extrabold leading-[1.2] text-[#102A45] dark:text-[#E4EDF4]">Nova senha</h1>
<p class="mt-2 text-[15px] leading-[1.4] text-[#546E85] dark:text-[#A7B9C8]">Defina uma nova senha para sua conta.</p>
<form method="post" action="{{ route('password.store') }}" class="mt-7 space-y-5">@csrf
    <input type="hidden" name="token" value="{{ $request->route('token') }}">
    <div>
        <x-input-label for="email" value="E-mail" class="text-sm font-bold text-[#102A45] dark:text-[#E4EDF4]" />
        <x-text-input id="email" class="mt-2 block h-[52px] w-full rounded-[14px] border border-[#7A8C9C] bg-white px-4 text-[15px] text-[#102A45] focus:border-[#0082A3] focus:ring-2 focus:ring-[#D2E6F5] dark:bg-[#142230] dark:text-[#E4EDF4]" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
        <x-input-error :messages="$errors->get('email')" class="mt-2 space-y-1 text-sm font-semibold text-[#D32F2F] dark:text-[#F2A29B]" />
    </div>
    <div>
        <x-input-label for="password" value="Nova senha" class="text-sm font-bold text-[#102A45] dark:text-[#E4EDF4]" />
        <x-text-input id="password" class="mt-2 block h-[52px] w-full rounded-[14px] border border-[#7A8C9C] bg-white px-4 text-[15px] text-[#102A45] focus:border-[#0082A3] focus:ring-2 focus:ring-[#D2E6F5] dark:bg-[#142230] dark:text-[#E4EDF4]" type="password" name="password" required autocomplete="new-password" />
        <x-input-error :messages="$errors->get('password')" class="mt-2 space-y-1 text-sm font-semibold text-[#D32F2F] dark:text-[#F2A29B]" />
    </div>
    <div>
        <x-input-label for="password_confirmation" value="Confirme a nova senha" class="text-sm font-bold text-[#102A45] dark:text-[#E4EDF4]" />
        <x-text-input id="password_confirmation" class="mt-2 block h-[52px] w-full rounded-[14px] border border-[#7A8C9C] bg-white px-4 text-[15px] text-[#102A45] focus:border-[#0082A3] focus:ring-2 focus:ring-[#D2E6F5] dark:bg-[#142230] dark:text-[#E4EDF4]" type="password" name="password_confirmation" required autocomplete="new-password" />
        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 space-y-1 text-sm font-semibold text-[#D32F2F] dark:text-[#F2A29B]" />
    </div>
    <button class="inline-flex min-h-[52px] w-full items-center justify-center rounded-full bg-[#0082A3] px-6 text-base font-extrabold text-white transition-colors hover:bg-[#006C89] focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-[#102A45]" type="submit">Salvar nova senha</button>
</form>
@endsection

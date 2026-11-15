@extends('layouts.guest')
@section('title', 'Confirmar senha · ori')
@section('content')
<h1 class="font-sans text-[30px] font-extrabold leading-[1.2] text-[#102A45] dark:text-[#E4EDF4]">Confirme sua senha</h1>
<p class="mt-2 text-[15px] leading-[1.4] text-[#546E85] dark:text-[#A7B9C8]">Esta é uma área protegida. Confirme sua senha para continuar.</p>
<form method="post" action="{{ route('password.confirm') }}" class="mt-7 space-y-5">@csrf
    <div>
        <x-input-label for="password" value="Senha" />
        <x-text-input id="password" class="mt-2 block h-[52px] w-full px-4 text-[15px] focus:ring-2" type="password" name="password" required autocomplete="current-password" />
        <x-input-error :messages="$errors->get('password')" class="mt-2" />
    </div>
    <button class="inline-flex min-h-[52px] w-full items-center justify-center rounded-full bg-[#0082A3] px-6 text-base font-extrabold text-white transition-colors hover:bg-[#006C89] focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-[#102A45]" type="submit">Confirmar senha</button>
</form>
@endsection

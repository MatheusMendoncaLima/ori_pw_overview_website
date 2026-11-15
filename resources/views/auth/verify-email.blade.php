@extends('layouts.guest')
@section('title', 'Confirmar e-mail · ori')
@section('content')
<h1 class="font-sans text-[30px] font-extrabold leading-[1.2] text-[#102A45] dark:text-[#E4EDF4]">Confirme seu e-mail</h1>
<p class="mt-2 text-[15px] leading-[1.4] text-[#546E85] dark:text-[#A7B9C8]">Acesse o link enviado ao seu e-mail para concluir a confirmação.</p>
@if (session('status') == 'verification-link-sent')
    <p class="mt-5 rounded-[14px] border border-[#B8DCC0] bg-[#EAF8EC] px-4 py-3 text-sm font-semibold text-[#2E7D32] dark:border-[#315B3D] dark:bg-[#20442D] dark:text-[#86C79A]" role="status">Um novo link de confirmação foi enviado.</p>
@endif
<div class="mt-7 space-y-4">
    <form method="post" action="{{ route('verification.send') }}">@csrf
        <button class="inline-flex min-h-[52px] w-full items-center justify-center rounded-full bg-[#0082A3] px-6 text-base font-extrabold text-white transition-colors hover:bg-[#006C89]" type="submit">Reenviar link</button>
    </form>
    <form method="post" action="{{ route('logout') }}">@csrf
        <button class="flex min-h-12 w-full items-center justify-center text-sm font-bold text-[#102A45] underline underline-offset-4 dark:text-[#E4EDF4]" type="submit">Sair</button>
    </form>
</div>
@endsection

@php($link = 'rounded-full px-4 py-2 text-sm font-bold text-base-content/80 hover:bg-base-200 hover:text-primary')
@php($active = 'bg-base-200 text-primary')
<nav x-data="{ open: false }" class="border-b border-base-300 bg-base-100" aria-label="Navegação da conta">
    <div class="mx-auto flex h-[72px] max-w-7xl items-center justify-between gap-4 px-4 sm:px-6 lg:px-8">
        <x-ori-brand :href="route('dashboard')" caption="Painel institucional" />
        <div class="hidden items-center gap-1 md:flex">
            <a class="{{ $link }} {{ request()->routeIs('dashboard') ? $active : '' }}" href="{{ route('dashboard') }}">Painel</a>
            @if(auth()->user()->role === 'admin')<a class="{{ $link }} {{ request()->routeIs('admin.*') ? $active : '' }}" href="{{ route('admin.contents.index') }}">Conteúdos</a>@endif
            <a class="{{ $link }}" href="{{ route('home') }}">Ver site ↗</a>
        </div>
        <div class="hidden items-center gap-2 text-sm md:flex">
            <span class="font-bold text-base-content/70">{{ auth()->user()->name }}</span>
            <a class="{{ $link }}" href="{{ route('profile.edit') }}">Perfil</a>
            <form method="post" action="{{ route('logout') }}">@csrf<button class="btn btn-outline btn-sm rounded-full" type="submit">Sair</button></form>
        </div>
        <button class="btn btn-ghost btn-sm rounded-full md:hidden" type="button" @click="open = ! open" :aria-expanded="open.toString()" aria-controls="account-menu">Menu</button>
    </div>
    <div id="account-menu" x-show="open" x-cloak class="flex flex-col gap-1 border-t border-base-300 px-4 py-3 md:hidden">
        <a class="{{ $link }}" href="{{ route('dashboard') }}">Painel</a>
        @if(auth()->user()->role === 'admin')<a class="{{ $link }}" href="{{ route('admin.contents.index') }}">Conteúdos</a>@endif
        <a class="{{ $link }}" href="{{ route('profile.edit') }}">Perfil</a>
        <form method="post" action="{{ route('logout') }}">@csrf<button class="{{ $link }} w-full text-left" type="submit">Sair</button></form>
    </div>
</nav>

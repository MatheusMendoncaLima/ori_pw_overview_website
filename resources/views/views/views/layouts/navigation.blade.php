<nav x-data="{ open: false }" class="admin-nav" aria-label="Navegação da conta">
    <div class="admin-nav-inner"><x-ori-brand :href="route('dashboard')" caption="Painel institucional" variant="admin-brand" />
        <div class="admin-links"><a class="{{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">Painel</a>@if(auth()->user()->role === 'admin')<a class="{{ request()->routeIs('admin.*') ? 'active' : '' }}" href="{{ route('admin.contents.index') }}">Conteúdos</a>@endif<a href="{{ route('home') }}">Ver site ↗</a></div>
        <div class="admin-account"><span>{{ auth()->user()->name }}</span><a href="{{ route('profile.edit') }}">Perfil</a><form method="post" action="{{ route('logout') }}">@csrf<button type="submit">Sair ↗</button></form></div>
        <button class="account-menu-toggle" type="button" @click="open = ! open" :aria-expanded="open.toString()" aria-controls="account-menu">Menu</button>
    </div>
    <div id="account-menu" class="account-mobile" x-show="open" x-cloak><a href="{{ route('dashboard') }}">Painel</a>@if(auth()->user()->role === 'admin')<a href="{{ route('admin.contents.index') }}">Conteúdos</a>@endif<a href="{{ route('profile.edit') }}">Perfil</a><form method="post" action="{{ route('logout') }}">@csrf<button type="submit">Sair</button></form></div>
</nav>

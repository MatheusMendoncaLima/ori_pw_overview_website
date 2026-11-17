@php
    $label = 'mb-1 block text-sm font-bold';
    $field = 'w-full rounded-[14px] border border-[#7A8C9C] bg-base-100 px-4 py-3 text-[15px] focus:border-primary focus:ring-2 focus:ring-primary/20';
    $hint = 'mt-1 block text-xs text-base-content/60';
    $error = 'mt-1 block text-sm font-semibold text-error';
@endphp
<form method="post" action="{{ $action }}" class="mt-8 rounded-[20px] border border-base-300 bg-base-100 p-6 sm:p-8" novalidate>
    @csrf
    @if($method !== 'POST') @method($method) @endif
    <div class="mb-6 flex items-start gap-4">
        <span class="grid h-10 w-10 shrink-0 place-items-center rounded-xl bg-base-200 text-sm font-extrabold text-primary">01</span>
        <div><h2 class="font-brand text-2xl font-extrabold">Conteúdo</h2><p class="text-sm text-base-content/70">Escreva para leitura rápida e mantenha a linguagem clara.</p></div>
    </div>
    <div class="grid gap-5 sm:grid-cols-2">
        <div>
            <label class="{{ $label }}" for="section">Seção <span class="text-error">*</span></label>
            <select id="section" name="section" class="{{ $field }}" required>@foreach($sections as $value => $text)<option value="{{ $value }}" @selected(old('section', $content->section) === $value)>{{ $text }}</option>@endforeach</select>
            @error('section')<small class="{{ $error }}">{{ $message }}</small>@enderror
        </div>
        <div>
            <label class="{{ $label }}" for="badge">Identificação curta</label>
            <input id="badge" name="badge" type="text" maxlength="80" class="{{ $field }}" value="{{ old('badge', $content->badge) }}" placeholder="Ex.: PILAR 01 · ROTINA">
            @error('badge')<small class="{{ $error }}">{{ $message }}</small>@enderror
        </div>
        <div class="sm:col-span-2">
            <label class="{{ $label }}" for="title">Título <span class="text-error">*</span></label>
            <input id="title" name="title" type="text" maxlength="180" class="{{ $field }}" value="{{ old('title', $content->title) }}" required>
            @error('title')<small class="{{ $error }}">{{ $message }}</small>@enderror
        </div>
        <div class="sm:col-span-2">
            <label class="{{ $label }}" for="summary">Resumo <span class="text-error">*</span></label>
            <textarea id="summary" name="summary" rows="4" maxlength="6000" class="{{ $field }}" required>{{ old('summary', $content->summary) }}</textarea>
            <small class="{{ $hint }}">Até 6.000 caracteres. Este texto aparece em destaque no site.</small>
            @error('summary')<small class="{{ $error }}">{{ $message }}</small>@enderror
        </div>
        <div class="sm:col-span-2">
            <label class="{{ $label }}" for="details">Detalhes adicionais</label>
            <textarea id="details" name="details" rows="8" maxlength="30000" class="{{ $field }}">{{ old('details', $content->details) }}</textarea>
            <small class="{{ $hint }}">O HTML não é interpretado; o conteúdo aparece como texto.</small>
            @error('details')<small class="{{ $error }}">{{ $message }}</small>@enderror
        </div>
        <div>
            <label class="{{ $label }}" for="display_order">Ordem de exibição <span class="text-error">*</span></label>
            <input id="display_order" name="display_order" type="number" min="0" max="2147483647" class="{{ $field }}" value="{{ old('display_order', $content->display_order ?? 0) }}" required>
            @error('display_order')<small class="{{ $error }}">{{ $message }}</small>@enderror
        </div>
        <div>
            <label class="flex cursor-pointer items-start gap-3 rounded-[14px] border border-base-300 bg-base-200 p-4" for="is_active">
                <input type="hidden" name="is_active" value="0">
                <input id="is_active" name="is_active" type="checkbox" value="1" class="mt-1 h-5 w-5 rounded border-[#7A8C9C] text-primary focus:ring-2 focus:ring-primary/20" @checked(old('is_active', $content->is_active ?? true))>
                <span><strong class="block text-sm">Publicar no site</strong><small class="text-xs text-base-content/70">Conteúdos inativos continuam editáveis no painel.</small></span>
            </label>
            @error('is_active')<small class="{{ $error }}">{{ $message }}</small>@enderror
        </div>
    </div>
    <div class="mt-8 flex flex-wrap items-center gap-4">
        <button class="btn btn-primary min-h-[52px] px-7" type="submit"><span>{{ $submitLabel }}</span><span aria-hidden="true">↗</span></button>
        <a href="{{ route('admin.contents.index') }}" class="font-bold underline underline-offset-4">Cancelar</a>
    </div>
</form>

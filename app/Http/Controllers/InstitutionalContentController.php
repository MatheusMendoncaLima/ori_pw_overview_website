<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreInstitutionalContentRequest;
use App\Http\Requests\UpdateInstitutionalContentRequest;
use App\Models\InstitutionalContent;
use App\Services\InstitutionalContentService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class InstitutionalContentController extends Controller
{
    public function __construct(private readonly InstitutionalContentService $contentService)
    {
    }

    public function index(): View
    {
        return view('admin.contents.index', [
            'contents' => $this->contentService->all(),
            'statistics' => $this->contentService->dashboard(),
            'sections' => config('ori.sections'),
        ]);
    }

    public function create(): View
    {
        return view('admin.contents.create', ['content' => new InstitutionalContent(), 'sections' => config('ori.sections')]);
    }

    public function store(StoreInstitutionalContentRequest $request): RedirectResponse
    {
        $this->contentService->create($request->validated());
        return redirect()->route('admin.contents.index')->with('status', 'Conteúdo institucional criado.');
    }

    public function show(InstitutionalContent $content): View
    {
        return view('admin.contents.show', ['content' => $this->contentService->find($content), 'sections' => config('ori.sections')]);
    }

    public function edit(InstitutionalContent $content): View
    {
        return view('admin.contents.edit', ['content' => $this->contentService->find($content), 'sections' => config('ori.sections')]);
    }

    public function update(UpdateInstitutionalContentRequest $request, InstitutionalContent $content): RedirectResponse
    {
        $this->contentService->update($content, $request->validated());
        return redirect()->route('admin.contents.index')->with('status', 'Conteúdo institucional atualizado.');
    }

    public function destroy(InstitutionalContent $content): RedirectResponse
    {
        $this->contentService->delete($content);
        return redirect()->route('admin.contents.index')->with('status', 'Conteúdo institucional removido.');
    }
}

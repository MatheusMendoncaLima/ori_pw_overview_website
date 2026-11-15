<?php

namespace App\Http\Controllers;

use App\Services\InstitutionalContentService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function __construct(private readonly InstitutionalContentService $contentService)
    {
    }

    public function __invoke(Request $request): View
    {
        return view('dashboard', [
            'statistics' => $request->user()->role === 'admin' ? $this->contentService->dashboard() : null,
            'roleLabels' => ['admin' => 'Administrador do site', 'user' => 'Usuário do site'],
        ]);
    }
}

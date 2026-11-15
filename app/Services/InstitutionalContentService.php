<?php

namespace App\Services;

use App\Models\InstitutionalContent;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class InstitutionalContentService
{
    public function active(): Collection
    {
        return InstitutionalContent::query()->where('is_active', true)->ordered()->get();
    }

    public function all(): LengthAwarePaginator
    {
        return InstitutionalContent::query()->ordered()->paginate(15)->withQueryString();
    }

    public function find(InstitutionalContent $content): InstitutionalContent
    {
        return $content;
    }

    public function create(array $data): InstitutionalContent
    {
        return DB::transaction(fn () => InstitutionalContent::create($data));
    }

    public function update(InstitutionalContent $content, array $data): InstitutionalContent
    {
        return DB::transaction(function () use ($content, $data): InstitutionalContent {
            $content->update($data);
            return $content->refresh();
        });
    }

    public function delete(InstitutionalContent $content): void
    {
        DB::transaction(fn () => $content->delete());
    }

    public function dashboard(): array
    {
        return [
            'total' => InstitutionalContent::query()->count(),
            'active' => InstitutionalContent::query()->where('is_active', true)->count(),
            'inactive' => InstitutionalContent::query()->where('is_active', false)->count(),
        ];
    }
}

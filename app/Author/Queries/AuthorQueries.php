<?php

namespace App\Author\Queries;

use App\Models\Author;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Builder;

class AuthorQueries
{
    public function list(): Collection
    {
        return $this->getQuery()->get();
    }

    private function getQuery(): Builder
    {
        return Author::query();
    }
}

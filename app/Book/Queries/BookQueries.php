<?php

namespace App\Book\Queries;

use App\Book\Models\Book;
use App\Common\DTOs\PagerDTO;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class BookQueries
{
    public function list(PagerDTO $paging): LengthAwarePaginator
    {
        return $this->getQuery()->paginate(perPage: $paging->perPage, page: $paging->page);
    }

    private function getQuery(): Builder
    {
        return Book::query();
    }
}

<?php

namespace App\Book\Queries;

use App\Book\Models\Book;
use App\Common\DTOs\PagerDTO;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;

class BookQueries
{
    private function getQuery(): Builder
    {
        return Book::query();
    }

    public function list(PagerDTO $paging): LengthAwarePaginator
    {
        return $this->getQuery()->paginate(perPage: $paging->perPage, page: $paging->page);
    }
}

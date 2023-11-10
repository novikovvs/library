<?php

namespace App\Book\Queries;

use App\Models\Book;
use App\Common\DTOs\PagerDTO;
use App\Book\DTOs\BookListFilterDTO;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class BookQueries
{
    public function list(PagerDTO $paging, BookListFilterDTO $filterDTO): LengthAwarePaginator
    {
        return $this
            ->getQuery()
            ->when($filterDTO->authorName, fn ($q) => $q->whereHas('authors', fn ($q) => $q->where('name', 'like', "%$filterDTO->authorName%"))
            )
            ->paginate(perPage: $paging->perPage, page: $paging->page);
    }

    private function getQuery(): Builder
    {
        return Book::query()
            ->with([
                'authors',
                'owner',
            ]);
    }
}

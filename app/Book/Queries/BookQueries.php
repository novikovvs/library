<?php

namespace App\Book\Queries;

use App\Book\Models\Book;
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
            ->when($filterDTO->authorName, fn ($q) => $q->whereHas('author', fn ($q) => $q->where('name', 'like', "%$filterDTO->authorName%"))
            )
            ->paginate(perPage: $paging->perPage, page: $paging->page);
    }

    private function getQuery(): Builder
    {
        return Book::query()
            ->with([
                'author',
                'owner',
            ]);
    }
}

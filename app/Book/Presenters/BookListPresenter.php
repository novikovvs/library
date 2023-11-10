<?php

namespace App\Book\Presenters;

use App\Common\DTOs\PagerDTO;
use App\Book\Queries\BookQueries;
use App\Book\DTOs\BookListFilterDTO;
use App\Book\ResourceModels\BookListResourceModel;

class BookListPresenter
{
    public function __construct(
        private readonly BookQueries $bookQueries,
        private readonly BookPresenter $bookPresenter,
    ) {
    }

    public function present(PagerDTO $paging, BookListFilterDTO $filter): BookListResourceModel
    {
        $paginator = $this->bookQueries->list($paging, $filter);

        $list = new BookListResourceModel();

        $list->page = $paginator->currentPage();
        $list->perPage = $paginator->perPage();
        $list->totalPages = $paginator->lastPage();
        $list->total = $paginator->total();

        foreach ($paginator->items() as $book) {
            $list->items[] = $this->bookPresenter->present($book);
        }

        return $list;
    }
}

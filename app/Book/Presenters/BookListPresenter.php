<?php

namespace App\Book\Presenters;

use App\Book\Queries\BookQueries;
use App\Book\ResourceModels\BookListResourceModel;
use App\Common\DTOs\PagerDTO;

class BookListPresenter
{
    public function __construct(
        private readonly BookQueries $bookQueries,
        private readonly BookPresenter $bookPresenter,
    ) {
    }

    public function present(PagerDTO $paging): BookListResourceModel
    {
        $paginator = $this->bookQueries->list($paging);

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

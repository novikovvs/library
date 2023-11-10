<?php

namespace App\Book\Actions;

use Throwable;
use App\Models\Book;
use App\Book\DTOs\CreateBookDTO;
use App\Book\Presenters\BookPresenter;
use App\Book\ResourceModels\BookResourceModel;

class CreateBookAction
{
    public function __construct(
        private readonly BookPresenter $bookPresenter,
    ) {
    }

    /**
     * @throws Throwable
     */
    public function execute(CreateBookDTO $DTO): BookResourceModel
    {
        $book = new Book();

        $book->name = $DTO->name;
        $book->saveOrFail();

        $book->authors()->attach($DTO->authorIds);

        return $this->bookPresenter->present($book);
    }
}

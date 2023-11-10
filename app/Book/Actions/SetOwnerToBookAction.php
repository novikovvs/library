<?php

namespace App\Book\Actions;

use Throwable;
use App\Book\Models\Book;
use App\Book\DTOs\SetOwnerToBookDTO;
use App\Book\Presenters\BookPresenter;
use App\Book\ResourceModels\BookResourceModel;
use App\Book\Exceptions\BookAlreadyHasAnOwnerException;

class SetOwnerToBookAction
{
    public function __construct(
        private readonly BookPresenter $bookPresenter,
    ) {
    }

    /**
     * @throws Throwable
     */
    public function execute(Book $book, SetOwnerToBookDTO $DTO): BookResourceModel
    {
        if ($book->owner_id && $DTO->ownerId) {
            throw new BookAlreadyHasAnOwnerException();
        }

        $book->updateOrFail(['owner_id' => $DTO->ownerId]);

        return $this->bookPresenter->present($book);
    }
}

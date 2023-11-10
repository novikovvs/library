<?php

namespace App\Book\Presenters;

use App\Book\Models\Book;
use App\Book\ResourceModels\BookResourceModel;
use App\User\Presenters\UserShortPresenter;

class BookPresenter
{
    public function __construct(
        private readonly UserShortPresenter $userShortPresenter,
    )
    {
    }

    public function present(Book $book): BookResourceModel
    {
        $bookResource = new BookResourceModel();

        $bookResource->owner = $this->userShortPresenter->present($book->owner);
        $bookResource->id = $book->id;
        $bookResource->name = $book->name;
        $bookResource->author = $book->author;
        $bookResource->createdAt = $book->created_at;
        $bookResource->updatedAt = $book->updated_at;

        return $bookResource;
    }
}

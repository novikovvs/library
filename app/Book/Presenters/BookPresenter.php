<?php

namespace App\Book\Presenters;

use App\Book\Models\Book;
use App\User\Presenters\UserShortPresenter;
use App\Book\ResourceModels\BookResourceModel;

class BookPresenter
{
    public function __construct(
        private readonly UserShortPresenter $userShortPresenter,
    ) {
    }

    public function present(Book $book): BookResourceModel
    {
        $bookResource = new BookResourceModel();

        $bookResource->owner = $this->userShortPresenter->present($book->owner);
        $bookResource->id = $book->id;
        $bookResource->name = $book->name;
        $bookResource->author = $book->author;
        $bookResource->createdAt = $book->created_at->format('Y-m-d');
        $bookResource->updatedAt = $book->updated_at->format('Y-m-d');

        return $bookResource;
    }
}

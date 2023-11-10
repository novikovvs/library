<?php

namespace App\Book\Presenters;

use App\Book\Models\Book;
use App\Author\Presenters\AuthorPresenter;
use App\User\Presenters\UserShortPresenter;
use App\Book\ResourceModels\BookResourceModel;

class BookPresenter
{
    public function __construct(
        private readonly UserShortPresenter $userShortPresenter,
        private readonly AuthorPresenter $authorPresenter,
    ) {
    }

    public function present(Book $book): BookResourceModel
    {
        $bookResource = new BookResourceModel();

        $bookResource->owner = $this->userShortPresenter->present($book->owner);
        $bookResource->id = $book->id;
        $bookResource->name = $book->name;
        $bookResource->author = $this->authorPresenter->present($book->author);
        $bookResource->createdAt = $book->created_at->format('Y-m-d');
        $bookResource->updatedAt = $book->updated_at->format('Y-m-d');

        return $bookResource;
    }
}

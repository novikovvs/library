<?php

namespace App\Author\Presenters;

use App\Author\Queries\AuthorQueries;

class AuthorListPresenter
{
    public function __construct(
        private readonly AuthorQueries $authorQueries,
        private readonly AuthorPresenter $authorPresenter,
    ) {
    }

    public function present(): array
    {
        $authors = $this->authorQueries->list();

        $result = [];

        foreach ($authors as $author) {
            $result[] = $this->authorPresenter->present($author);
        }

        return $result;
    }
}

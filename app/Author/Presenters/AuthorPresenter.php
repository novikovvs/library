<?php

namespace App\Author\Presenters;

use App\Models\Author;
use App\Author\ResourceModels\AuthorResourceModel;

class AuthorPresenter
{
    public function present(Author $author): AuthorResourceModel
    {
        $authorResource = new AuthorResourceModel();

        $authorResource->id = $author->id;
        $authorResource->name = $author->name;

        return $authorResource;
    }
}

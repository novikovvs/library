<?php

namespace App\Book\ResourceModels;

use App\Author\ResourceModels\AuthorResourceModel;
use App\User\ResourceModels\UserShortResourceModel;
use App\Common\ResourceModels\AbstractResourceModel;

class BookResourceModel extends AbstractResourceModel
{
    public int $id;

    public AuthorResourceModel $author;

    public string $name;

    public string $createdAt;

    public string $updatedAt;

    public ?UserShortResourceModel $owner;
}

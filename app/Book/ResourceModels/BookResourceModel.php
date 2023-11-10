<?php

namespace App\Book\ResourceModels;

use App\Common\ResourceModels\AbstractResourceModel;
use App\User\ResourceModels\UserShortResourceModel;

class BookResourceModel extends AbstractResourceModel
{
    public int $id;

    public string $author;

    public string $name;

    public string $createdAt;

    public string $updatedAt;

    public ?UserShortResourceModel $owner;
}

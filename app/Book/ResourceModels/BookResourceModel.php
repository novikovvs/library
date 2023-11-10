<?php

namespace App\Book\ResourceModels;

use App\User\ResourceModels\UserShortResourceModel;
use App\Common\ResourceModels\AbstractResourceModel;

class BookResourceModel extends AbstractResourceModel
{
    public int $id;

    public array $authors = [];

    public string $name;

    public string $createdAt;

    public string $updatedAt;

    public ?UserShortResourceModel $owner;
}

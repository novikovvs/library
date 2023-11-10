<?php

namespace App\Book\ResourceModels;

use App\Common\ResourceModels\AbstractResourceModel;
use App\User\ResourceModels\UserShortResourceModel;
use Illuminate\Support\Carbon;

class BookResourceModel extends AbstractResourceModel
{
    public int $id;

    public string $author;

    public string $name;

    public Carbon $createdAt;

    public Carbon $updatedAt;

    public ?UserShortResourceModel $owner;
}

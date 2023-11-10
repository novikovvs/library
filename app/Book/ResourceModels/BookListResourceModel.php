<?php

namespace App\Book\ResourceModels;

use App\Common\ResourceModels\AbstractResourceModel;

class BookListResourceModel extends AbstractResourceModel
{
    public array $items = [];

    public int $perPage;

    public int $page;

    public int $totalPages;

    public int $total;
}

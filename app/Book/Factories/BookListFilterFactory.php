<?php

namespace App\Book\Factories;

use App\Book\DTOs\BookListFilterDTO;
use App\Book\Requests\BookListRequest;

class BookListFilterFactory
{
    public static function fromRequest(BookListRequest $request): BookListFilterDTO
    {
        $filter = new BookListFilterDTO();

        $filter->authorName = $request->get('author_name');

        return $filter;
    }
}

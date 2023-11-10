<?php

namespace App\Book\Factories;

use App\Book\DTOs\StoreBookDTO;
use App\Book\Requests\StoreBookRequest;

class StoreBookFactory
{
    public static function fromRequest(StoreBookRequest $request): StoreBookDTO
    {
        $DTO = new StoreBookDTO();

        $DTO->name = $request->get('name');
        $DTO->authorIds = $request->get('author_ids');

        return $DTO;
    }
}

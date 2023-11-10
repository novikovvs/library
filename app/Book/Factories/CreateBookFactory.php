<?php

namespace App\Book\Factories;

use App\Book\DTOs\CreateBookDTO;
use App\Book\Requests\CreateBookRequest;

class CreateBookFactory
{
    public static function fromRequest(CreateBookRequest $request): CreateBookDTO
    {
        $DTO = new CreateBookDTO();

        $DTO->name = $request->get('name');
        $DTO->authorIds = $request->get('author_ids');

        return $DTO;
    }
}

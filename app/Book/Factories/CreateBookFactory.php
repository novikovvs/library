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
        $DTO->authorId = (int) $request->get('author_id');

        return $DTO;
    }
}

<?php

namespace App\Book\Factories;

use App\Book\DTOs\SetOwnerToBookDTO;
use App\Book\Requests\SetOwnerToBookRequest;

class SetOwnerToBookFactory
{
    public static function fromRequest(SetOwnerToBookRequest $request): SetOwnerToBookDTO
    {
        $DTO = new SetOwnerToBookDTO();
        $DTO->ownerId = $request->get('owner_id');

        return $DTO;
    }
}

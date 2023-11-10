<?php

namespace App\Book\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SetOwnerToBookRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'owner_id' => 'integer|exists:users,id',
        ];
    }
}

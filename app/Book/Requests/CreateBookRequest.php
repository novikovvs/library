<?php

namespace App\Book\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateBookRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'author_id' => 'required|integer|exists:authors,id',
            'name'      => 'required|string',
        ];
    }
}

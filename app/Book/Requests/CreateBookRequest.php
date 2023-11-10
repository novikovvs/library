<?php

namespace App\Book\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateBookRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'author_ids'   => 'required|array',
            'author_ids.*' => 'exists:authors,id',
            'name'         => 'required|string',
        ];
    }
}

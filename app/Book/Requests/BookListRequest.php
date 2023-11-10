<?php

namespace App\Book\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookListRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'per_page' => 'integer|in:10,20,50',
            'page'     => 'integer',
        ];
    }
}

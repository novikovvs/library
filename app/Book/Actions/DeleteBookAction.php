<?php

namespace App\Book\Actions;

use Throwable;
use App\Book\Models\Book;

class DeleteBookAction
{
    /**
     * @throws Throwable
     */
    public function execute(Book $book): bool
    {
        return $book->deleteOrFail();
    }
}

<?php

namespace App\Book\Actions;

use Throwable;
use App\Models\Book;

class DestroyBookAction
{
    /**
     * @throws Throwable
     */
    public function execute(Book $book): bool
    {
        return $book->deleteOrFail();
    }
}

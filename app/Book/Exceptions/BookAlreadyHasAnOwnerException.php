<?php

namespace App\Book\Exceptions;

use App\Common\Exceptions\BusinessLogicException;

class BookAlreadyHasAnOwnerException extends BusinessLogicException
{
    protected $message = 'Книга уже взята другим пользователем!';

    protected $code = 409;
}

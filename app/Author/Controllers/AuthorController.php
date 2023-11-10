<?php

namespace App\Author\Controllers;

use Illuminate\Http\JsonResponse;
use App\Http\Traits\JsonResponsible;
use App\Author\Presenters\AuthorListPresenter;

class AuthorController
{
    use JsonResponsible;

    public function index(AuthorListPresenter $presenter): JsonResponse
    {
        return $this->success($presenter->present());
    }
}

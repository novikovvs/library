<?php

namespace App\Book\Controllers;

use Illuminate\Http\JsonResponse;
use App\Http\Traits\JsonResponsible;
use App\Book\Requests\BookListRequest;
use App\Common\Factories\PagerFactory;
use App\Book\Presenters\BookListPresenter;

class BookController
{
    use JsonResponsible;

    public function index(BookListRequest $request, BookListPresenter $presenter): JsonResponse
    {
        return $this->success($presenter->present(PagerFactory::fromRequest($request)));
    }
}

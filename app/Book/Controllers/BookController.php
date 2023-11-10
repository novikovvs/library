<?php

namespace App\Book\Controllers;

use App\Book\Presenters\BookListPresenter;
use App\Book\Requests\BookListRequest;
use App\Common\Factories\PagerFactory;
use App\Http\Traits\JsonResponsible;
use Illuminate\Http\JsonResponse;

class BookController
{
    use JsonResponsible;

    public function index(BookListRequest $request, BookListPresenter $presenter): JsonResponse
    {
        return $this->success($presenter->present(PagerFactory::fromRequest($request)));
    }
}

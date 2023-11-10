<?php

namespace App\Book\Controllers;

use Throwable;
use App\Models\Book;
use Illuminate\Http\JsonResponse;
use App\Http\Traits\JsonResponsible;
use App\Book\Actions\StoreBookAction;
use App\Book\Requests\BookListRequest;
use App\Common\Factories\PagerFactory;
use App\Book\Actions\DestroyBookAction;
use App\Book\Requests\StoreBookRequest;
use App\Book\Factories\StoreBookFactory;
use App\Book\Actions\SetOwnerToBookAction;
use App\Book\Presenters\BookListPresenter;
use App\Book\Requests\SetOwnerToBookRequest;
use App\Book\Factories\BookListFilterFactory;
use App\Book\Factories\SetOwnerToBookFactory;

class BookController
{
    use JsonResponsible;

    public function index(BookListRequest $request, BookListPresenter $presenter): JsonResponse
    {
        $pager = PagerFactory::fromRequest($request);
        $filter = BookListFilterFactory::fromRequest($request);

        return $this->success($presenter->present($pager, $filter));
    }

    /**
     * @throws Throwable
     */
    public function store(StoreBookRequest $request, StoreBookAction $action): JsonResponse
    {
        return $this->success($action->execute(StoreBookFactory::fromRequest($request)));
    }

    /**
     * @throws Throwable
     */
    public function destroy(DestroyBookAction $action, Book $book): JsonResponse
    {
        return $this->success($action->execute($book));
    }

    /**
     * @throws Throwable
     */
    public function setOwner(SetOwnerToBookRequest $request, SetOwnerToBookAction $action, Book $book): JsonResponse
    {
        return $this->success(
            $action->execute($book, SetOwnerToBookFactory::fromRequest($request))
        );
    }
}

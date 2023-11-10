<?php

namespace App\Common\Factories;

use App\Common\DTOs\PagerDTO;
use Illuminate\Http\Request;

class PagerFactory
{
    public static function fromRequest(Request $request): PagerDTO
    {
        $pager = new PagerDTO();

        $pager->perPage = (int) $request->get('per_page', 20);
        $pager->page = (int) $request->get('page', 1);

        return $pager;
    }
}

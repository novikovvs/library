<?php

namespace App\Common\Factories;

use Illuminate\Http\Request;
use App\Common\DTOs\PagerDTO;

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

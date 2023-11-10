<?php

namespace App\Common\ResourceModels;

use Illuminate\Support\Str;
use JsonSerializable;

abstract class AbstractResourceModel implements JsonSerializable
{
    protected const SKIP = [];

    public function jsonSerialize(): array
    {
        $propMap = [];

        foreach (get_object_vars($this) as $propName => $prop) {
            if (! in_array($propName, static::SKIP, true)) {
                $propMap[$propName] = Str::snake($propName);
            }
        }

        $result = [];

        foreach ($propMap as $originName => $transformName) {
            $result[$transformName] = $this->{$originName};
        }

        return $result;
    }
}

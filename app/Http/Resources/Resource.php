<?php

namespace App\Http\Resources;

abstract class Resource
{
    public static function collection($collection, $resourceClass) {
        return $collection->map(function ($item) use($resourceClass) {
            return (new $resourceClass($item))->toArray();
        });
    }
}
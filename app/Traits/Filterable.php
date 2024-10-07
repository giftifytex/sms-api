<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;

trait Filterabble
{
    /**
     * Apply filtering to a query based on request input.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param array $filterableFields
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function applyFilter($query, array $filterableFields = [])
    {
        // Loop through each filterable field and apply it if it's present in the request
        foreach ($filterableFields as $field) {
            if (request()->has($field)) {
                $query->where($field, request()->get($field));
            }
        }

        return $query;
    }
}

<?php

namespace App\Traits;

trait Sortable
{
    /**
     * Apply sorting to query based on request input
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param array $sortableFields
     * @return \Illuminate\Database\Eloquent\Builder
     */

    public function applySorting($query, array $sortableFields = [])
    {
        //Retrieve the sort parameter from the request
        $sortBy = request()->input('sort');
        $sortDirection = request()->input('order', 'asc'); //Set the default direction to ascending


        // Check if sorting is allowed for the specified fields
        if ($sortBy && in_array($sortBy, $sortableFields)) {
            //apply sorting to the query

            return $query->orderBy($sortBy, $sortDirection);
        }

        // Return the query as it is if no sorting is specified.
        return $query;
    }
}

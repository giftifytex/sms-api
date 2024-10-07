<?php

namespace App\Trait;

trait Searchable
{

    /**
     * Apply searching to query based on request input
     * @param \Illuminate\Database\Eloquet\Builder $query
     * @param array $searchableFields
     * @param $searchTerm
     * @return \Illuminate\Database\Eloquent\Builder 
     */

    public function applySearch($query, array $searchableFields = [], $searchTerm)
    {
        if (!empty($searchTerm)) {
            $query->where(function ($q) use ($searchableFields, $searchTerm) {
                foreach ($searchableFields as $field) {
                    $q->orWhere($field, 'LIKE', '%' . $searchTerm . '%');
                }
            });
        }

        return $query;
    }
}

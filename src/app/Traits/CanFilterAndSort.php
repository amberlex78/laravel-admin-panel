<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

trait CanFilterAndSort
{
    /**
     * Apply search and sort filters to the query.
     */
    public function scopeApplyFilters(Builder $query, Request $request, array $searchableColumns = [], array $sortableColumns = []): Builder
    {
        // Search
        if ($request->filled('search') && !empty($searchableColumns)) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search, $searchableColumns) {
                foreach ($searchableColumns as $column) {
                    $q->orWhere($column, 'like', "%{$search}%");
                }
            });
        }

        // Sort
        $sort = $request->input('sort');
        $direction = $request->input('direction', 'asc');

        if ($sort && in_array($sort, $sortableColumns)) {
            $query->orderBy($sort, $direction);
        } else {
            // Default sort if none provided
            $query->orderBy('id', 'desc');
        }

        return $query;
    }
}

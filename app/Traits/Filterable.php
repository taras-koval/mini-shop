<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Schema;

trait Filterable
{
    public function scopeFilter(Builder $builder, $request): Builder
    {
        $filters = $request->all();
        $modelFields = Schema::getColumnListing((new self())->getTable());

        if (isset($filters['search']) && is_array($filters['search'])) {
            foreach ($filters['search'] as $field => $value) {
                $builder->where($field, 'LIKE', "%$value%");
            }
        }

        if (isset($filters['sort']) && is_array($filters['sort'])) {
            foreach ($filters['sort'] as $field => $value) {
                if ($value == 'asc') {
                    $builder->orderBy($field);
                }
                if ($value == 'desc') {
                    $builder->orderByDesc($field);
                }
            }
        }

        foreach ($filters as $field => $value) {
            if (!in_array($field, $modelFields)) {
                continue;
            }

            if (is_array($value)) {
                $builder->whereIn($field, $value);
            } else {
                $builder->where($field, $value);
            }
        }

        return $builder;
    }
}

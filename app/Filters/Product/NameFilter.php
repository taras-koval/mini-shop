<?php

namespace App\Filters\Product;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

class NameFilter
{
    public function filter(Builder $builder, string $value): Builder
    {
        return $builder->where(DB::raw('LOWER(products.name)'), 'LIKE', '%' . strtolower($value) . '%');
    }
}

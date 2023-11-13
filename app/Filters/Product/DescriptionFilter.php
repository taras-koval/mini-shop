<?php

namespace App\Filters\Product;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

class DescriptionFilter
{
    public function filter(Builder $builder, string $value): Builder
    {
        return $builder->where(DB::raw('LOWER(products.description)'), 'LIKE', '%' . strtolower($value) . '%');
    }
}

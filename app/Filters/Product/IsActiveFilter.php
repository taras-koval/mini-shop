<?php

namespace App\Filters\Product;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

class IsActiveFilter
{
    public function filter(Builder $builder, string $value): Builder
    {
        return $builder->where(DB::raw('products.is_active'), $value);
    }
}

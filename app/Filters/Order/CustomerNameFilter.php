<?php

namespace App\Filters\Order;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

class CustomerNameFilter
{
    public function filter(Builder $builder, string $value): Builder
    {
        return $builder->where(DB::raw('LOWER(orders.customer_name)'), 'LIKE', '%' . strtolower($value) . '%');
    }
}

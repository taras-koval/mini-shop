<?php

namespace App\Filters\Order;

use Illuminate\Contracts\Database\Eloquent\Builder;

class StatusFilter
{
    public function filter(Builder $builder, array $value): Builder
    {
        return $builder->whereIn('orders.status', $value);
    }
}

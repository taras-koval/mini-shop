<?php

namespace App\Filters\Common;

use Illuminate\Database\Eloquent\Builder;

class CreatedToFilter
{
    public function filter(Builder $builder, string $value): Builder
    {
        return $builder->whereDate('created_at', '<=', $value);
    }
}

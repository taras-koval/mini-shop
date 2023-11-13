<?php

namespace App\Filters\Common;

use Illuminate\Database\Eloquent\Builder;

class UpdatedToFilter
{
    public function filter(Builder $builder, string $value): Builder
    {
        return $builder->whereDate('updated_at', '<=', $value);
    }
}

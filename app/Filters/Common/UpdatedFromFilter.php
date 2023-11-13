<?php

namespace App\Filters\Common;

use Illuminate\Database\Eloquent\Builder;

class UpdatedFromFilter
{
    public function filter(Builder $builder, string $value): Builder
    {
        return $builder->whereDate('updated_at', '>=', $value);
    }
}

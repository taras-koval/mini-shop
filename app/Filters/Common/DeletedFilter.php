<?php

namespace App\Filters\Common;

use Illuminate\Database\Eloquent\Builder;

class DeletedFilter
{
    public function filter(Builder $builder): Builder
    {
        return $builder->whereNotNull('deleted_at');
    }
}

<?php

namespace App\Traits;

use Illuminate\Contracts\Database\Eloquent\Builder;

trait IsFilterable
{
    public function scopeFilter(Builder $builder, $request)
    {
        return (new $this->filterClass($request))->filter($builder);
    }
}

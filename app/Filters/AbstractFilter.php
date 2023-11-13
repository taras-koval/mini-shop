<?php

namespace App\Filters;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class AbstractFilter
{
    protected Request $request;

    protected array $filters = [];

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function filter(Builder $builder): Builder
    {
        foreach ($this->getFilters() as $filter => $value) {
            $this->resolveFilter($filter)->filter($builder, $value);
        }

        if (isset($this->request->sort_by)) {
            $builder->orderBy($this->request->sort_by, $this->request->sort_order ?: 'asc');
        }

        return $builder;
    }

    protected function getFilters(): array
    {
        return $this->request->only(array_keys($this->filters));
    }

    protected function resolveFilter(string $filter)
    {
        return new $this->filters[$filter];
    }
}

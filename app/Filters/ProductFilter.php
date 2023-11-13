<?php

namespace App\Filters;

use App\Filters\Common\CreatedFromFilter;
use App\Filters\Common\CreatedToFilter;
use App\Filters\Common\UpdatedFromFilter;
use App\Filters\Common\UpdatedToFilter;
use App\Filters\Product\DescriptionFilter;
use App\Filters\Product\IsActiveFilter;
use App\Filters\Product\NameFilter;

class ProductFilter extends AbstractFilter
{
    protected array $filters = [
        'name' => NameFilter::class,
        'description' => DescriptionFilter::class,
        'is_active' => IsActiveFilter::class,
        'created_from' => CreatedFromFilter::class,
        'created_to' => CreatedToFilter::class,
        'updated_from' => UpdatedFromFilter::class,
        'updated_to' => UpdatedToFilter::class,
    ];
}

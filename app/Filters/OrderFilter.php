<?php

namespace App\Filters;

use App\Filters\Common\CreatedFromFilter;
use App\Filters\Common\CreatedToFilter;
use App\Filters\Common\UpdatedFromFilter;
use App\Filters\Common\UpdatedToFilter;
use App\Filters\Order\CustomerNameFilter;
use App\Filters\Order\StatusFilter;

class OrderFilter extends AbstractFilter
{
    protected array $filters = [
        'status' => StatusFilter::class,
        'customer_name' => CustomerNameFilter::class,
        'created_from' => CreatedFromFilter::class,
        'created_to' => CreatedToFilter::class,
        'updated_from' => UpdatedFromFilter::class,
        'updated_to' => UpdatedToFilter::class,
    ];
}

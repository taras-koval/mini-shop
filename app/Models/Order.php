<?php

namespace App\Models;

use App\Enums\OrderStatusEnum;
use App\Filters\OrderFilter;
use App\Traits\IsFilterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    use HasFactory, IsFilterable;

    protected $fillable = [
        'product_id',
        'customer_name',
        'customer_email',
        'customer_phone',
        'comment',
        'status',
    ];

    protected $casts = [
        'status' => OrderStatusEnum::class
    ];

    protected string $filterClass = OrderFilter::class;

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}

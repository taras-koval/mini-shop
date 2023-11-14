<?php

namespace App\Models;

use App\Enums\OrderStatusEnum;
use App\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    use HasFactory, Filterable;

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

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}

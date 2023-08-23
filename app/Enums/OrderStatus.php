<?php

namespace App\Enums;

enum OrderStatus:string {
    case New = 'new';
    case Processing = 'processing';
    case Delivering = 'delivering';
    case Delivered = 'delivered';
    case Completed = 'completed';
    case Canceled = 'canceled';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}



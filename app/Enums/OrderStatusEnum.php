<?php

namespace App\Enums;

enum OrderStatusEnum:string {
    case NEW = 'new';
    case PROCESSING = 'processing';
    case DELIVERING = 'delivering';
    case DELIVERED = 'delivered';
    case COMPLETED = 'completed';
    case CANCELED = 'canceled';
}



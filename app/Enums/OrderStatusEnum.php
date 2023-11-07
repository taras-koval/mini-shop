<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasLabel;

enum OrderStatusEnum:string implements HasLabel, HasColor {
    case NEW = 'new';
    case PROCESSING = 'processing';
    case DELIVERING = 'delivering';
    case COMPLETED = 'completed';
    case CANCELED = 'canceled';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::NEW => 'New',
            self::PROCESSING => 'Processing',
            self::DELIVERING => 'Delivering',
            self::COMPLETED => 'Completed',
            self::CANCELED => 'Canceled',
        };
    }

    public function getColor(): string|array|null
    {
        return match ($this) {
            self::NEW => 'success',
            self::PROCESSING => 'warning',
            self::DELIVERING => 'primary',
            self::COMPLETED => 'info',
            self::CANCELED => 'gray',
        };
    }
}



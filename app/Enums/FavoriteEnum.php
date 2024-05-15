<?php

namespace App\Enums;

use Spatie\Enum\Laravel\Enum;

final class FavoriteEnum extends Enum
{
    protected static function values(): array
    {
        return [
            'yes' => 'Yes',
            'no' => 'No',
        ];
    }
}

<?php

namespace App\Enums;

use Spatie\Enum\Laravel\Enum;

final class EvaluationEnum extends Enum
{
    protected static function values(): array
    {
        return [
            '1' => '1',
            '2' => '2',
            '3' => '3',
            '4' => '4',
            '5' => '5',
        ];
    }
}

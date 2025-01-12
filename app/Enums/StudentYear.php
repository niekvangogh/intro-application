<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class StudentYear extends Enum
{
    const firstYear = 0;
    const secondYear = 1;

    public static function getDescription($value): string
    {
        if ($value === self::firstYear) {
            return 'Leerjaar 1';
        }
        if ($value === self::secondYear) {
            return 'Leerjaar 2';
        }
    
        return parent::getDescription($value);
    }
}

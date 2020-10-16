<?php
declare(strict_types=1);

namespace App\Helpers;

use App\Interfaces\Helpers\CalculatorHelperInterface;

class StrengthCalculatorHelper implements CalculatorHelperInterface
{
    const BASE_VALUE = 5;

    /**
     * @param float $stat
     * @return float
     */
    public function getValue(float $stat): float
    {
        return self::BASE_VALUE - ($stat * 0.08);
    }
}

<?php
declare(strict_types=1);

namespace App\Helpers;

use App\Interfaces\Helpers\CalculatorHelperInterface;

class EnduranceCalculatorHelper implements CalculatorHelperInterface
{
    const BASE_VALUE = 100;

    /**
     * @param float $stat
     * @return float
     */
    public function getValue(float $stat): float
    {
        return $stat * self::BASE_VALUE;
    }
}

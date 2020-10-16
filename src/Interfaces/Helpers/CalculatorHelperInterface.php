<?php
declare(strict_types=1);

namespace App\Interfaces\Helpers;

interface CalculatorHelperInterface
{
    /**
     * @param float $stat
     * @return float
     */
    public function getValue(float $stat): float;
}

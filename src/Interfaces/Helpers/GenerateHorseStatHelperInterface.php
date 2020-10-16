<?php
declare(strict_types=1);

namespace App\Interfaces\Helpers;

interface GenerateHorseStatHelperInterface
{
    /**
     * Generate a random stats number
     * @return float
     */
    public function generate(): float;
}

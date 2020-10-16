<?php
declare(strict_types=1);

namespace App\Helpers;

use App\Interfaces\Helpers\GenerateHorseStatHelperInterface;

class GenerateHorseStatHelper implements GenerateHorseStatHelperInterface
{
    const MIN_STATS = 0;
    const MAX_STATS = 10;

    /**
     * Generate a random stats number
     * @return float
     */
    public function generate(): float
    {
        $value = (float) mt_rand(self::MIN_STATS, self::MAX_STATS);
        if ($value === 0.0) {
            return $this->generate();
        }

        return $value;
    }
}

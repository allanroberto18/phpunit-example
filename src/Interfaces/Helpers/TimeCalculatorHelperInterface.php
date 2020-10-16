<?php
declare(strict_types=1);

namespace App\Interfaces\Helpers;

use App\Entity\Horse;
use App\Entity\HorseRaceDetail;

interface TimeCalculatorHelperInterface
{
    /**
     * @param Horse $horse
     * @return HorseRaceDetail
     */
    public function processStatsAndGetValue(Horse $horse): HorseRaceDetail;
}

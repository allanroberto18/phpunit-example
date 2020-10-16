<?php
declare(strict_types=1);

namespace App\Interfaces\Services;

use App\Entity\Horse;
use App\Entity\HorseRaceDetail;

interface HorseRaceDetailServiceInterface
{
    /**
     * @param Horse $horse
     * @return HorseRaceDetail
     */
    public function processRaceDetailFromHorse(Horse $horse): HorseRaceDetail;
}

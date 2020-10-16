<?php
declare(strict_types=1);

namespace App\Interfaces\Repository;

use App\Entity\HorseRaceDetail;

interface HorseRaceDetailRepositoryInterface
{
    /**
     * @param HorseRaceDetail $horseRaceDetail
     * @return HorseRaceDetail
     * @throws \Doctrine\ORM\ORMException
     */
    public function persistHorseRaceDetail(HorseRaceDetail $horseRaceDetail): HorseRaceDetail;
}

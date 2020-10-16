<?php
declare(strict_types=1);

namespace App\Interfaces\Repository;

use App\Entity\Race;

interface RaceRepositoryInterface
{
    /**
     * @param Race $race
     * @return Race
     * @throws \Doctrine\ORM\ORMException
     */
    public function persistRace(Race $race): Race;
}

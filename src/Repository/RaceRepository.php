<?php
declare(strict_types=1);

namespace App\Repository;

use App\Entity\Race;
use App\Interfaces\Repository\RaceRepositoryInterface;
use Doctrine\ORM\EntityRepository;

class RaceRepository extends EntityRepository implements RaceRepositoryInterface
{
    /**
     * @param Race $race
     * @return Race
     * @throws \Doctrine\ORM\ORMException
     */
    public function persistRace(Race $race): Race
    {
        $this->getEntityManager()->persist($race);
        $this->getEntityManager()->flush();

        return $race;
    }
}

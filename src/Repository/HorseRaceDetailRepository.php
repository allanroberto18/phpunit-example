<?php
declare(strict_types=1);

namespace App\Repository;

use App\Entity\HorseRaceDetail;
use App\Interfaces\Repository\HorseRaceDetailRepositoryInterface;
use Doctrine\ORM\EntityRepository;

class HorseRaceDetailRepository extends EntityRepository implements HorseRaceDetailRepositoryInterface
{
    /**
     * @param HorseRaceDetail $horseRaceDetail
     * @return HorseRaceDetail
     * @throws \Doctrine\ORM\ORMException
     */
    public function persistHorseRaceDetail(HorseRaceDetail $horseRaceDetail): HorseRaceDetail
    {
        $this->getEntityManager()->persist($horseRaceDetail);
        $this->getEntityManager()->flush();

        return $horseRaceDetail;
    }
}

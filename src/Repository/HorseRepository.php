<?php
declare(strict_types=1);

namespace App\Repository;

use App\Entity\Horse;
use App\Interfaces\Repository\HorseRepositoryInterface;
use Doctrine\ORM\EntityRepository;

class HorseRepository extends EntityRepository implements HorseRepositoryInterface
{
    /**
     * @param Horse $horse
     * @return Horse
     * @throws \Doctrine\ORM\ORMException
     */
    public function persistHorse(Horse $horse): Horse
    {
        $this->getEntityManager()->persist($horse);
        $this->getEntityManager()->flush();

        return $horse;
    }
}

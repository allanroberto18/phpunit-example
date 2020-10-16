<?php
declare(strict_types=1);

namespace App\Interfaces\Repository;

use App\Entity\Horse;

interface HorseRepositoryInterface
{
    /**
     * @param Horse $horse
     * @return Horse
     * @throws \Doctrine\ORM\ORMException
     */
    public function persistHorse(Horse $horse): Horse;
}

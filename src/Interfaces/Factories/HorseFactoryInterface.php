<?php
declare(strict_types=1);

namespace App\Interfaces\Factories;

use App\Entity\Horse;

interface HorseFactoryInterface
{
    /**
     * create random horse object
     * @return Horse
     */
    public function createHorseObject(): Horse;
}

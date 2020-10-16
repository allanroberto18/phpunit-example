<?php
declare(strict_types=1);

namespace App\Interfaces\Services;

interface RaceServiceInterface
{
    /**
     * @return array
     */
    public function getListOfHorsesOnRace(): array;
}

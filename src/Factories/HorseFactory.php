<?php
declare(strict_types=1);

namespace App\Factories;

use App\Entity\Horse;
use App\Interfaces\Factories\HorseFactoryInterface;
use App\Interfaces\Helpers\GenerateHorseStatHelperInterface;

class HorseFactory implements HorseFactoryInterface
{
    /** @var GenerateHorseStatHelperInterface $helper */
    private $helper;

    /**
     * HorseFactory constructor.
     * @param GenerateHorseStatHelperInterface $helper
     */
    public function __construct(GenerateHorseStatHelperInterface $helper)
    {
        $this->helper = $helper;
    }

    /**
     * create random horse object
     * @return Horse
     */
    public function createHorseObject(): Horse
    {
        $speed = $this->helper->generate();
        $endurance = $this->helper->generate();
        $strength = $this->helper->generate();

        return new Horse($speed, $endurance, $strength);
    }
}

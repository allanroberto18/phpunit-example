<?php
declare(strict_types=1);

namespace App\Helpers;

use App\Entity\Horse;
use App\Entity\HorseRaceDetail;
use App\Interfaces\Helpers\CalculatorHelperInterface;
use App\Interfaces\Helpers\TimeCalculatorHelperInterface;

class TimeCalculatorHelper implements TimeCalculatorHelperInterface
{
    /** @var CalculatorHelperInterface $speedCalculatorHelper */
    private $speedCalculatorHelper;

    /** @var CalculatorHelperInterface $strengthCalculatorHelper */
    private $strengthCalculatorHelper;

    /** @var CalculatorHelperInterface $enduranceCalculatorHelper */
    private $enduranceCalculatorHelper;

    /**
     * TimeCalculatorHelper constructor.
     * @param CalculatorHelperInterface $speedCalculatorHelper
     * @param CalculatorHelperInterface $strengthCalculatorHelper
     * @param CalculatorHelperInterface $enduranceCalculatorHelper
     */
    public function __construct(
        CalculatorHelperInterface $speedCalculatorHelper,
        CalculatorHelperInterface $strengthCalculatorHelper,
        CalculatorHelperInterface $enduranceCalculatorHelper
    ) {
        $this->speedCalculatorHelper = $speedCalculatorHelper;
        $this->strengthCalculatorHelper = $strengthCalculatorHelper;
        $this->enduranceCalculatorHelper = $enduranceCalculatorHelper;
    }

    /**
     * @param Horse $horse
     * @return HorseRaceDetail
     */
    public function processStatsAndGetValue(Horse $horse): HorseRaceDetail
    {
        $speedCalculated = $this->speedCalculatorHelper->getValue($horse->getSpeed());
        $enduranceCalculated = $this->enduranceCalculatorHelper->getValue($horse->getEndurance());
        $strengthCalculated = $this->strengthCalculatorHelper->getValue($horse->getStrength());

        $horseRaceDetail = new HorseRaceDetail($horse, $speedCalculated, $enduranceCalculated, $strengthCalculated);

        $timeCalculated = $this->calculateTimeSpent($enduranceCalculated, $speedCalculated, $strengthCalculated);
        $horseRaceDetail->setTimeCalculated($timeCalculated);

        return $horseRaceDetail;
    }

    /**
     * @param float $enduranceCalculated
     * @param float $speedCalculated
     * @param float $strengthCalculated
     * @return float
     */
    private function calculateTimeSpent(float $enduranceCalculated, float $speedCalculated, float $strengthCalculated): float
    {
        $timeFullPower = $enduranceCalculated / $speedCalculated;
        $normalTime = (1500 - $enduranceCalculated) / $strengthCalculated;

        return $timeFullPower + $normalTime;
    }
}

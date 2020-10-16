<?php
declare(strict_types=1);

namespace App\Services;

use App\Entity\Horse;
use App\Entity\HorseRaceDetail;
use App\Interfaces\Helpers\TimeCalculatorHelperInterface;
use App\Interfaces\Repository\HorseRaceDetailRepositoryInterface;
use App\Interfaces\Repository\HorseRepositoryInterface;
use App\Interfaces\Services\HorseRaceDetailServiceInterface;

class HorseRaceDetailService implements HorseRaceDetailServiceInterface
{
    /** @var TimeCalculatorHelperInterface $timeCalculatorHelper */
    private $timeCalculatorHelper;

    /** @var HorseRepositoryInterface $horseRepositoryInterface */
    private $horseRepository;

    /**
     * HorseRaceDetailService constructor.
     * @param TimeCalculatorHelperInterface $timeCalculatorHelper
     * @param HorseRepositoryInterface $horseRepository
     */
    public function __construct(
        TimeCalculatorHelperInterface $timeCalculatorHelper,
        HorseRepositoryInterface $horseRepository
    ) {
        $this->timeCalculatorHelper = $timeCalculatorHelper;
        $this->horseRepository = $horseRepository;
    }

    /**
     * @param Horse $horse
     * @return HorseRaceDetail
     * @throws \Doctrine\ORM\ORMException
     */
    public function processRaceDetailFromHorse(Horse $horse): HorseRaceDetail
    {
        $horse = $this->horseRepository->persistHorse($horse);
        return $this->timeCalculatorHelper->processStatsAndGetValue($horse);

    }
}

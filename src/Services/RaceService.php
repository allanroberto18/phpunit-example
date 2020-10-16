<?php
declare(strict_types=1);

namespace App\Services;

use App\Entity\Race;
use App\Interfaces\Factories\HorseFactoryInterface;
use App\Interfaces\Repository\HorseRaceDetailRepositoryInterface;
use App\Interfaces\Repository\RaceRepositoryInterface;
use App\Interfaces\Services\HorseRaceDetailServiceInterface;
use App\Interfaces\Services\RaceServiceInterface;
use App\Repository\RaceRepository;

class RaceService implements RaceServiceInterface
{
    const TOTAL_HORSE_DURING_RACE = 8;

    /** @var HorseRaceDetailServiceInterface $horseRaceDetailService */
    private $horseRaceDetailService;

    /** @var HorseFactoryInterface $horseFactory */
    private $horseFactory;

    /** @var HorseRaceDetailRepositoryInterface $horseRaceDetailRepository $horseRaceDetailRepository */
    private $horseRaceDetailRepository;

    /** @var RaceRepository $repository */
    private $repository;

    /**
     * RaceService constructor.
     * @param HorseRaceDetailServiceInterface $horseRaceDetailService
     * @param HorseFactoryInterface $horseFactory
     * @param RaceRepositoryInterface $repository
     */
    public function __construct(
        HorseRaceDetailServiceInterface $horseRaceDetailService,
        HorseFactoryInterface $horseFactory,
        HorseRaceDetailRepositoryInterface $horseRaceDetailRepository,
        RaceRepositoryInterface $repository
    ) {
        $this->horseRaceDetailService = $horseRaceDetailService;
        $this->horseFactory = $horseFactory;
        $this->horseRaceDetailRepository = $horseRaceDetailRepository;
        $this->repository = $repository;
    }

    /**
     * @return array
     * @throws \Doctrine\ORM\ORMException
     */
    public function getListOfHorsesOnRace(): array
    {
        $race = $this->repository->persistRace(new Race());

        $horsesDuringRace = [];
        $i = 0;
        while($i < self::TOTAL_HORSE_DURING_RACE) {
            $horse = $this->horseFactory->createHorseObject();
            $horseRaceDetail = $this->horseRaceDetailService->processRaceDetailFromHorse($horse);
            $horseRaceDetail->setRace($race);

            $this->horseRaceDetailRepository->persistHorseRaceDetail($horseRaceDetail);

            $horsesDuringRace[] = $horseRaceDetail;
            $i++;
        }

        return $horsesDuringRace;
    }
}

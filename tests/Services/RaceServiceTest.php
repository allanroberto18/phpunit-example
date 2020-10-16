<?php
declare(strict_types=1);

namespace App\Tests\Services;

use App\Entity\HorseRaceDetail;
use App\Entity\Race;
use App\Interfaces\Factories\HorseFactoryInterface;
use App\Interfaces\Repository\HorseRaceDetailRepositoryInterface;
use App\Interfaces\Repository\RaceRepositoryInterface;
use App\Interfaces\Services\HorseRaceDetailServiceInterface;
use App\Services\RaceService;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class RaceServiceTest extends TestCase
{
    /** @var MockObject $raceRepository */
    private $raceRepository;

    /** @var MockObject $horseRaceDetailService */
    private $horseRaceDetailService;

    /** @var MockObject $horseFactory */
    private $horseFactory;

    /** @var MockObject $horseRaceDetail */
    private $horseRaceDetail;

    /** @var MockObject $horseRaceDetailRepository */
    private $horseRaceDetailRepository;

    /** @var MockObject $horseRaceResultModel */
    private $horseRaceResultModel;

    protected function setUp()
    {
        $this->raceRepository = $this->getMockBuilder(RaceRepositoryInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->horseRaceDetailService = $this->getMockBuilder(HorseRaceDetailServiceInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->horseFactory = $this->getMockBuilder(HorseFactoryInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->horseRaceDetailRepository = $this->getMockBuilder(HorseRaceDetailRepositoryInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->horseRaceResultModel = $this->getMockBuilder(HorseRaceDetail::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->horseRaceDetail = $this->getMockBuilder(HorseRaceDetail::class)
            ->disableOriginalConstructor()
            ->getMock();

        parent::setUp();
    }

    public function testRaceProcessing(): void
    {
        $i = 0;
        $totalHorses = 8;
        while($i < $totalHorses) {
            $listExpected[] = $this->horseRaceDetailService->expects($this->any())
                ->method('processRaceDetailFromHorse')
                ->willReturn($this->horseRaceDetail);

            $i++;
        }

        $this->raceRepository->expects($this->any())->method('persistRace')->willReturn(new Race());
        $this->horseRaceResultModel->expects($this->any())->method('getTimeCalculated')->willReturn(1);
        $this->horseRaceDetailRepository->expects($this->any())->method('persistHorseRaceDetail')->willReturn($this->horseRaceResultModel);
        $raceService = new RaceService($this->horseRaceDetailService, $this->horseFactory, $this->horseRaceDetailRepository, $this->raceRepository);
        $list = $raceService->getListOfHorsesOnRace();

        $this->assertEquals($totalHorses, sizeof($list));
        /** @var HorseRaceDetail $item */
        foreach ($list as $item) {
            $this->assertNotEmpty($item->getRace());
        }
    }
}

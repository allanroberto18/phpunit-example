<?php
declare(strict_types=1);

namespace App\Tests\Services;

use App\Entity\Horse;
use App\Entity\HorseRaceDetail;
use App\Interfaces\Factories\HorseFactoryInterface;
use App\Interfaces\Helpers\CalculatorHelperInterface;
use App\Interfaces\Helpers\TimeCalculatorHelperInterface;
use App\Interfaces\Repository\HorseRaceDetailRepositoryInterface;
use App\Interfaces\Repository\HorseRepositoryInterface;
use App\Services\HorseRaceDetailService;
use App\Tests\HelpersForTest;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class HorseRaceDetailServiceTest extends TestCase
{
    /** @var MockObject $enduranceCalculaterHelper */
    private $timeCalculaterHelper;

    /** @var MockObject $horseRepository */
    private $horseRepository;

    /** @var MockObject $horseRaceDetailRepository */
    private $horseRaceDetailRepository;

    /**
     * @var MockObject $horseModel
     */
    private $horseModel;

    /** @var MockObject $horseRaceResultModel */
    private $horseRaceResultModel;

    protected function setUp()
    {
        $this->timeCalculaterHelper = $this->getMockBuilder(TimeCalculatorHelperInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->horseRepository = $this->getMockBuilder(HorseRepositoryInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->horseModel = $this->getMockBuilder(Horse::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->horseRaceResultModel = $this->getMockBuilder(HorseRaceDetail::class)
            ->disableOriginalConstructor()
            ->getMock();

        parent::setUp();
    }

    /**
     * @dataProvider provider
     * @param float $endurance
     * @param float $speed
     * @param float $strength
     * @throws \Doctrine\ORM\ORMException
     */
    public function testGenerateRaceDetailFromHorse(float $endurance, float $speed, float $strength): void
    {
        $speedCalculated = HelpersForTest::calcSpeed($speed);
        $enduranceCalculated = HelpersForTest::calcEndurance($endurance);
        $strengthCalculated = HelpersForTest::calcStrength($strength);

        $timeCalculated = HelpersForTest::getTimeCalculated($enduranceCalculated, $speedCalculated, $strengthCalculated);

        $this->horseModel->expects($this->any())->method('getSpeed')->willReturn($speed);
        $this->horseModel->expects($this->any())->method('getEndurance')->willReturn($endurance);
        $this->horseModel->expects($this->any())->method('getStrength')->willReturn($strength);

        $this->horseRaceResultModel->expects($this->any())->method('getTimeCalculated')->willReturn($timeCalculated);
        $this->timeCalculaterHelper->expects($this->any())->method('processStatsAndGetValue')->willReturn($this->horseRaceResultModel);

        $this->horseRepository->expects($this->any())->method('persistHorse')->willReturn($this->horseModel);

        $horseResultService = new HorseRaceDetailService($this->timeCalculaterHelper, $this->horseRepository);

        $horseResult = $horseResultService->processRaceDetailFromHorse($this->horseModel);
        $this->assertEquals($timeCalculated, $horseResult->getTimeCalculated());
    }

    /**
     * @return array
     */
    public function provider(): array
    {
        return [
            [ HelpersForTest::getGenerateStat(), HelpersForTest::getGenerateStat(), HelpersForTest::getGenerateStat()],
            [ HelpersForTest::getGenerateStat(), HelpersForTest::getGenerateStat(), HelpersForTest::getGenerateStat()],
            [ HelpersForTest::getGenerateStat(), HelpersForTest::getGenerateStat(), HelpersForTest::getGenerateStat()],
            [ HelpersForTest::getGenerateStat(), HelpersForTest::getGenerateStat(), HelpersForTest::getGenerateStat()],
        ];
    }
}

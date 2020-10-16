<?php
declare(strict_types=1);

namespace App\Tests\Helpers;

use App\Entity\Horse;
use App\Helpers\TimeCalculatorHelper;
use App\Interfaces\Helpers\CalculatorHelperInterface;
use App\Tests\HelpersForTest;
use PHPUnit\Framework\TestCase;

class TimeCalculatorHelperTest extends TestCase
{
    /** @var MockObject $enduranceCalculaterHelper */
    private $enduranceCalculaterHelper;

    /** @var MockObject $speedCalculatorHelper */
    private $speedCalculatorHelper;

    /** @var MockObject $strengthCalculatorHelper */
    private $strengthCalculatorHelper;

    protected function setUp()
    {
        $this->enduranceCalculaterHelper = $this->getMockBuilder(CalculatorHelperInterface::class)->getMock();
        $this->speedCalculatorHelper = $this->getMockBuilder(CalculatorHelperInterface::class)->getMock();
        $this->strengthCalculatorHelper = $this->getMockBuilder(CalculatorHelperInterface::class)->getMock();

        parent::setUp();
    }

    /**
     * @dataProvider provider
     * @param float $endurance
     * @param float $speed
     * @param float $strength
     */
    public function testGetValueFromCalcOnHelper(float $endurance, float $speed, float $strength): void
    {
        $horseObject = new Horse($speed, $endurance, $strength);

        $calcSpeed = HelpersForTest::calcSpeed($speed);
        $calcEndurance = HelpersForTest::calcEndurance($endurance);
        $calcStrength = HelpersForTest::calcStrength($strength);

        $this->speedCalculatorHelper->expects($this->any())->method('getValue')->willReturn($calcSpeed);
        $this->enduranceCalculaterHelper->expects($this->any())->method('getValue')->willReturn($calcEndurance);
        $this->strengthCalculatorHelper->expects($this->any())->method('getValue')->willReturn($calcStrength);

        $timeCalculatorHelper = new TimeCalculatorHelper(
            $this->speedCalculatorHelper,
            $this->strengthCalculatorHelper,
            $this->enduranceCalculaterHelper
        );

        $valueExpected = HelpersForTest::getTimeCalculated($calcEndurance, $calcSpeed, $calcStrength);

        $horseRaceDetail = $timeCalculatorHelper->processStatsAndGetValue($horseObject);
        $this->assertEquals($valueExpected, $horseRaceDetail->getTimeCalculated());
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

<?php
declare(strict_types=1);

namespace App\Tests\Helpers;

use App\Helpers\SpeedCalculatorHelper;
use App\Tests\HelpersForTest;
use PHPUnit\Framework\TestCase;

class SpeedCalculatorHelperTest extends TestCase
{
    /**
     * check speed generated on helper
     * @dataProvider provider
     * @param float $value
     */
    public function testGetValueFromCalcOnHelper(float $value): void
    {
        $helper = new SpeedCalculatorHelper();
        $healSpeed = $helper->getValue($value);
        $valueExpected = HelpersForTest::calcSpeed($value);

        $this->assertEquals($valueExpected, $healSpeed);
    }

    /**
     * @return array
     */
    public function provider(): array
    {
        return [
            [ HelpersForTest::getGenerateStat() ],
            [ HelpersForTest::getGenerateStat() ],
            [ HelpersForTest::getGenerateStat() ],
            [ HelpersForTest::getGenerateStat() ]
        ];
    }
}

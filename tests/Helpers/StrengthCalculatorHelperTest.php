<?php
declare(strict_types=1);

namespace App\Tests\Helpers;

use App\Helpers\StrengthCalculatorHelper;
use App\Tests\HelpersForTest;
use PHPUnit\Framework\TestCase;

class StrengthCalculatorHelperTest extends TestCase
{
    /**
     * check strength generated on helper
     * @dataProvider provider
     * @param float $value
     */
    public function testGetValueFromCalcOnHelper(float $value): void
    {
        $helper = new StrengthCalculatorHelper();

        $realStrength = $helper->getValue($value);
        $valueExpected = HelpersForTest::calcStrength($value);

        $this->assertEquals($valueExpected, $realStrength);
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

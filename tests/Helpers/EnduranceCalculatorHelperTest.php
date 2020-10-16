<?php
declare(strict_types=1);

namespace App\Tests\Helpers;

use App\Helpers\EnduranceCalculatorHelper;
use App\Tests\HelpersForTest;
use PHPUnit\Framework\TestCase;

class EnduranceCalculatorHelperTest extends TestCase
{
    /**
     * check strength generated on helper
     * @dataProvider provider
     * @param float $value
     */
    public function testGetValueFromCalcOnHelper(float $value): void
    {
        $helper = new EnduranceCalculatorHelper();
        $realEndurance = $helper->getValue($value);
        $valueExpected = HelpersForTest::calcEndurance($value);

        $this->assertEquals($valueExpected, $realEndurance);
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

<?php
declare(strict_types=1);

namespace App\Tests\Helpers;

use App\Helpers\GenerateHorseStatHelper;
use PHPUnit\Framework\TestCase;

class GenerateHorseStatHelperTest extends TestCase
{
    /**
     * check if stat was generated
     */
    public function testGenerateHorseStatsFromHelper(): void
    {
        $helper = new GenerateHorseStatHelper();
        $stat = $helper->generate();

        $this->assertGreaterThan(0.0, $stat);
        $this->assertLessThan(10.0, $stat);
    }
}

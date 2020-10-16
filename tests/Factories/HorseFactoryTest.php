<?php
declare(strict_types=1);

namespace App\Tests\Factories;

use App\Factories\HorseFactory;
use App\Interfaces\Helpers\GenerateHorseStatHelperInterface;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class HorseFactoryTest extends TestCase
{
    /**
     * @var MockObject $helper
     */
    private $helper;

    protected function setUp()
    {
        $this->helper = $this->getMockBuilder(GenerateHorseStatHelperInterface::class)->getMock();

        parent::setUp();
    }

    /**
     * check if object horse was created
     */
    public function testCreateHorseObject(): void
    {
        $this->helper->expects($this->any())->method('generate')->willReturn(2);
        $stat = $this->helper->generate();

        $factory = new HorseFactory($this->helper);
        $horse = $factory->createHorseObject();

        $this->assertEquals($stat, $horse->getSpeed());
        $this->assertEquals($stat, $horse->getEndurance());
        $this->assertEquals($stat, $horse->getStrength());
    }
}

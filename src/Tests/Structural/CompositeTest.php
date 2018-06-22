<?php

namespace Tests\Structural;

use PHPUnit\Framework\TestCase;
use Structural\Composite\GymBag\Bottle;
use Structural\Composite\GymBag\Deodorant;
use Structural\Composite\GymBag\GymBag;
use Structural\Composite\GymBag\Towel;

class CompositeTest extends TestCase
{
    /**
     * @var GymBag
     */
    private $sut;

    protected function setUp()
    {
        $this->sut = new GymBag();
    }

    public function testCompositionOfGymBag(): void
    {
        $this->sut->addItems(new Towel('red', 'large'));
        $this->sut->addItems(new Deodorant('Amber'));
        $this->sut->addItems(new Bottle('700ml'));

        $this->assertCount(3, $this->sut->pack());
    }
}

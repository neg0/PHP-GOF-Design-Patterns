<?php

namespace Tests\Structural;

use PHPUnit\Framework\MockObject\MockObject;
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

    /**
     * @var Towel
     */
    private $towel;

    /**
     * @var Deodorant
     */
    private $deodorant;

    /**
     * @var Bottle
     */
    private $bottle;

    protected function setUp(): void
    {
        $this->towel = $this->getTowel();
        $this->deodorant = $this->getDeodorant();
        $this->bottle = $this->getBottle();

        $this->sut = new GymBag();
    }

    public function testCompositionOfGymBag(): void
    {
        $this->sut->addItems($this->towel);
        $this->sut->addItems($this->deodorant);
        $this->sut->addItems($this->bottle);

        $this->assertCount(3, $this->sut->pack());
        $this->assertContains($this->towel, $this->sut->pack());
        $this->assertContains($this->deodorant, $this->sut->pack());
        $this->assertContains($this->bottle, $this->sut->pack());
    }

    private function getTowel(): MockObject
    {
        return $this
            ->getMockBuilder(Towel::class)
            ->enableOriginalConstructor()
            ->setConstructorArgs(['red', 'large'])
            ->getMock();
    }

    private function getDeodorant(): MockObject
    {
        return $this
            ->getMockBuilder(Deodorant::class)
            ->enableOriginalConstructor()
            ->setConstructorArgs(['Amber'])
            ->getMock();
    }

    private function getBottle(): MockObject
    {
        return $this
            ->getMockBuilder(Bottle::class)
            ->enableOriginalConstructor()
            ->setConstructorArgs(['700ml'])
            ->getMock();
    }
}

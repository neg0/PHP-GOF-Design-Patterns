<?php

namespace Tests\Structural;

use PHPUnit\Framework\Constraint\IsType;
use PHPUnit\Framework\TestCase;
use Structural\Bridge\GeoLocationDate\GeoLocationService;
use Structural\Bridge\GeoLocationDate\UnitedKingdom;
use Structural\Bridge\GeoLocationDate\UnitedStates;

class BridgeTest extends TestCase
{
    /**
     * @var GeoLocationService
     */
    private $sut;

    /**
     * @var string
     */
    private $dateUnitedKingdom;

    /**
     * @var string
     */
    private $dateUnitedStates;

    protected function setUp()
    {
        $this->sut = new GeoLocationService(new UnitedKingdom());
        $this->dateUnitedKingdom = (new \DateTime('now'))->format(UnitedKingdom::TIME_DATE_FORMAT);
        $this->dateUnitedStates = (new \DateTime('now'))->format(UnitedStates::TIME_DATE_FORMAT);
    }

    public function testGeoLocationServiceForUKAndUSA(): void
    {
        $this->assertInternalType(IsType::TYPE_STRING, $this->sut->get());
        $this->assertEquals($this->dateUnitedKingdom, $this->sut->get());

        $this->sut->setImplementation(new UnitedStates());
        $this->assertInternalType(IsType::TYPE_STRING, $this->sut->get());
        $this->assertEquals($this->dateUnitedStates, $this->sut->get());
    }
}

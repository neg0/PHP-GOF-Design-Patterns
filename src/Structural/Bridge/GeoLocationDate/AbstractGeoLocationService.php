<?php

namespace Structural\Bridge\GeoLocationDate;

abstract class AbstractGeoLocationService
{
    /**
     * @var GeoLocationDateInterface
     */
    protected $implementation;

    public function __construct(GeoLocationDateInterface $geoLocationDate)
    {
        $this->implementation = $geoLocationDate;
    }

    public function setImplementation(GeoLocationDateInterface $implementation): void
    {
        $this->implementation = $implementation;
    }

    abstract public function get();
}

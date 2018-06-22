<?php

namespace Structural\Bridge\GeoLocationDate;

class GeoLocationService extends AbstractGeoLocationService
{
    public function get(): string
    {
        return $this->implementation->formatDate('now');
    }
}

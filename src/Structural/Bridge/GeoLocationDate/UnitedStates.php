<?php

namespace Structural\Bridge\GeoLocationDate;

class UnitedStates implements GeoLocationDateInterface
{
    public const TIME_DATE_FORMAT = 'm/d/Y';

    public function formatDate(string $date): string
    {
        return (new \DateTime($date))->format(self::TIME_DATE_FORMAT);
    }
}

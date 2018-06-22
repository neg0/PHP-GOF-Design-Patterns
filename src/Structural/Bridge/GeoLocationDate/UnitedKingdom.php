<?php

namespace Structural\Bridge\GeoLocationDate;

class UnitedKingdom implements GeoLocationDateInterface
{
    public const TIME_DATE_FORMAT = 'd/m/Y';

    public function formatDate(string $date): string
    {
        return (new \DateTime($date))->format(self::TIME_DATE_FORMAT);
    }
}

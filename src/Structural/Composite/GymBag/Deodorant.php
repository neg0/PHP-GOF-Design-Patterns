<?php

namespace Structural\Composite\GymBag;

class Deodorant implements Packable
{
    private const FIELD_SCENT = 'Scent';
    private const AVAILABLE_SCENTS = ['Amber', 'Musk', 'Apollo', 'Spice'];
    private const EXCEPTION_MSG = 'Scent is not allowed';

    /**
     * @var string
     */
    private $scent;

    /**
     * @throws \Exception
     */
    public function __construct(string $scent)
    {
        if (false === in_array($scent, self::AVAILABLE_SCENTS)) {
            throw new \Exception(self::EXCEPTION_MSG);
        }

        $this->scent = $scent;
    }

    public function pack()
    {
        return [
            self::FIELD_SCENT => $this->scent,
        ];
    }
}

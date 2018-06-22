<?php

namespace Structural\Composite\GymBag;

class Bottle implements Packable
{
    private const FIELD_SIZE = 'Size';

    /**
     * @var string
     */
    private $size;

    public function __construct(string $size)
    {
        $this->size = $size;
    }

    public function pack()
    {
        return [
            self::FIELD_SIZE => $this->size,
        ];
    }
}

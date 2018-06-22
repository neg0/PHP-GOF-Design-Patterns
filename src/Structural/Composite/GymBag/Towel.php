<?php

namespace Structural\Composite\GymBag;

class Towel implements Packable
{
    private const FIELD_COLOUR = 'Colour';
    private const FIELD_SIZE = 'Size';
    private const ALLOWED_SIZE = ['large', 'medium'];
    private const EXCEPTION_MSG = 'Size is not allowed';

    /**
     * @var string
     */
    private $colour;

    /**
     * @var string
     */
    private $size;

    /**
     * @throws \Exception
     */
    public function __construct(string $colour, string $size)
    {
        if (false === in_array(strtolower($size), self::ALLOWED_SIZE)) {
            throw new \Exception(self::EXCEPTION_MSG);
        }

        $this->colour = $colour;
        $this->size = $size;
    }

    public function pack()
    {
        return [
            self::FIELD_COLOUR => $this->colour,
            self::FIELD_SIZE => $this->size,
        ];
    }
}

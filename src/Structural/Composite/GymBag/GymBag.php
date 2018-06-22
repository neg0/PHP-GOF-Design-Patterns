<?php

namespace Structural\Composite\GymBag;

class GymBag implements Packable
{
    /**
     * @var \ArrayIterator
     */
    private $items;

    public function __construct()
    {
        $this->items = new \ArrayIterator();
    }

    public function addItems(Packable $item)
    {
        $this->items->append($item);
    }

    public function pack()
    {
        return $this->items->getArrayCopy();
    }
}

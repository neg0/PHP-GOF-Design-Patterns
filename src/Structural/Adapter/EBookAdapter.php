<?php

namespace Structural\Adapter;

class EBookAdapter implements BookInterface
{
    /**
     * @var EBookInterface
     */
    protected $eBook;

    /**
     * @param EBookInterface $eBook
     */
    public function __construct(EBookInterface $eBook)
    {
        $this->eBook = $eBook;
    }

    /**
     * This class makes the proper translation from one interface to another.
     */
    public function open()
    {
        $this->eBook->unlock();
    }
    public function turnPage()
    {
        $this->eBook->pressNext();
    }
    /**
     * notice the adapted behavior here: EBookInterface::getPage() will return two integers, but BookInterface
     * supports only a current page getter, so we adapt the behavior here
     *
     * @return int
     */
    public function getPage(): int
    {
        return $this->eBook->getPage()[0];
    }
}

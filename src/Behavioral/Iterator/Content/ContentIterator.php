<?php

namespace Behavioral\Iterator\Content;

class ContentIterator implements \Iterator
{
    /**
     * @var array
     */
    private $contentItems;

    /**
     * @var int
     */
    private $currentIndex = 0;

    public function add(Content $contents): void
    {
        array_push($this->contentItems, $contents);
    }

    public function remove(Content $contentToRemove): void
    {
        /**
         * @var int $key
         * @var Content $content
         */
        foreach ($this->contentItems as $key => $content) {
            if ($content->getId()->toString() === $contentToRemove->getId()->toString()) {
                unset($this->contentItems[$key]);
            }
        }

        $this->contentItems = array_values($this->contentItems);
    }

    public function current()
    {
        return $this->contentItems[$this->currentIndex];
    }

    public function next()
    {
        $this->currentIndex++;
    }

    public function key()
    {
        return $this->currentIndex;
    }

    public function valid()
    {
        return isset($this->contentItems[$this->currentIndex]);
    }

    public function rewind()
    {
        $this->currentIndex = 0;
    }
}
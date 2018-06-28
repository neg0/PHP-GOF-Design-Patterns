<?php

namespace Tests\Behavioral;

use Behavioral\Iterator\Content\Content;
use Behavioral\Iterator\Content\ContentIterator;
use PHPUnit\Framework\TestCase;
use Behavioral\Iterator\Exception\InvalidContentTypeException;

class IteratorTest extends TestCase
{
    /**
     * @var ContentIterator
     */
    private $sut;

    protected function setUp()
    {
        $this->sut = new ContentIterator();
    }

    /**
     * @throws InvalidContentTypeException
     */
    public function testShouldIterates(): void
    {
        $contentOne = Content::create('Lorem ipsum dolor site', 'book', '21 january 1988');
        $this->sut->add($contentOne);

        $this->assertInstanceOf(Content::class, $this->sut->current());
        $this->assertSame($contentOne->getId()->toString(), $this->sut->current()->getId()->toString());
        $this->assertSame(null, $this->sut->next());
        $this->assertSame(null, $this->sut->rewind());

        $contentTwo = Content::create('Lorem ipsum dolor site', 'book', '22 january 1988');
        $this->sut->add($contentTwo);
        $this->sut->next();
        $this->assertInstanceOf(Content::class, $this->sut->current());
        $this->assertSame($contentTwo->getId()->toString(), $this->sut->current()->getId()->toString());
        $this->assertSame(null, $this->sut->next());
        $this->assertSame(null, $this->sut->rewind());
    }
}

<?php

namespace Behavioral\Iterator\Content;

use Behavioral\Iterator\Exception\InvalidContentTypeException;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

class Content
{
    private const ALLOWED_TYPES = ['video', 'audio', 'powerpoint', 'book', 'article'];
    private const TIME_ZONE = 'UTC';

    /**
     * @var UuidInterface
     */
    private $id;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $type;

    /**
     * @var \DateTime
     */
    private $publishDate;

    private function __construct(UuidInterface $id, string $title, string $type, \DateTime $publishDate)
    {
        $this->id = $id;
        $this->title = $title;
        $this->type = $type;
        $this->publishDate = $publishDate;
    }

    /**
     * @throws InvalidContentTypeException
     */
    public static function create(string $title, string $type, string $publishDate)
    {
        if (false === in_array($type, self::ALLOWED_TYPES)) {
            throw new InvalidContentTypeException();
        }

        return new self(
            Uuid::uuid4(),
            $title,
            $type,
            new \DateTime($publishDate, new \DateTimeZone(self::TIME_ZONE))
        );
    }

    public function getId(): UuidInterface
    {
        return $this->id;
    }

    protected function setId(UuidInterface $id): void
    {
        $this->id = $id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    protected function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @throws InvalidContentTypeException
     */
    protected function setType(string $type): void
    {
        if (false === in_array($type, self::ALLOWED_TYPES)) {
            throw new InvalidContentTypeException();
        }

        $this->type = $type;
    }

    public function getPublishDate(): \DateTime
    {
        return $this->publishDate;
    }

    protected function setPublishDate(\DateTime $publishDate): void
    {
        $this->publishDate = $publishDate;
    }
}

<?php

namespace Structural\Decorator;

class ResponseService implements ResponseInterface
{
    /**
     * @var array
     */
    private $data;

    public function __construct(string $data)
    {
        $this->data = $data;
    }

    public function createResponse()
    {
        return $this->data;
    }
}
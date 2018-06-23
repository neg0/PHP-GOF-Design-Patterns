<?php

namespace Structural\Decorator;

abstract class ResponseDecorator implements ResponseInterface
{
    /**
     * @var ResponseInterface
     */
    protected $wrapped;

    public function __construct(ResponseInterface $response)
    {
        $this->wrapped = $response;
    }
}

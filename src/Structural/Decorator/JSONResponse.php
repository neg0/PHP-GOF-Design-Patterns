<?php

namespace Structural\Decorator;

class JSONResponse extends ResponseDecorator
{
    public function createResponse()
    {
        return json_encode($this->wrapped->createResponse());
    }
}

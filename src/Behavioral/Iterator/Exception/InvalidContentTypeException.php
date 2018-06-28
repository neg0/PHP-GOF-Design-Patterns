<?php

namespace Behavioral\Iterator\Exception;

use Throwable;

class InvalidContentTypeException extends \Exception
{
    public function __construct(string $message = "", int $code = 0, Throwable $previous = null)
    {
        parent::__construct('Type is not exist for content', 500, $previous);
    }
}

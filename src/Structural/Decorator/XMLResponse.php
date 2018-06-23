<?php

namespace Structural\Decorator;

class XMLResponse extends ResponseDecorator
{
    public function createResponse()
    {
        $doc = new \DOMDocument();
        $data = $this->wrapped->createResponse();
        $doc->appendChild($doc->createElement('content', $data));

        return $doc->saveXML();
    }
}

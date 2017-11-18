<?php

namespace core\HttpComponent;

class Request
{
    public static function create()
    {

    }

    public static function createRequestObject(): Request
    {
        return new Request();
    }

    public function getRaw(): string
    {
        return 'lel';
    }
}
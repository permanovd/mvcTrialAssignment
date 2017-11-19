<?php

namespace core\HttpComponent;

class Request
{

    protected $uri;
    public static function create()
    {

    }

    public static function createRequestObject(): Request
    {
        $request = new self();
        $requestUri = $GLOBALS['_SERVER']['REQUEST_URI'];
        if (substr($requestUri, -1) === '/') {
            $requestUri = rtrim($requestUri, '/');
        }

        if (0 === strpos($requestUri, '/')) {
            $requestUri = ltrim($requestUri, '/');
        }
        $request->uri = $requestUri;
        $options = $GLOBALS;

        return $request;
    }

    public function getRaw(): string
    {
        return 'lel';
    }

    /**
     * @return mixed
     */
    public function getUri()
    {
        return $this->uri;
    }
}
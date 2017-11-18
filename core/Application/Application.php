<?php

namespace core\Application;

use core\HttpComponent\Request;
use core\HttpComponent\Response;

//use core\HttpComponent\Response;

//use core\HttpComponent\Response;


class Application
{

    public function __construct()
    {

    }

    /**
     * @param Request $request
     * @return Response
     */
    public function processRequest(Request $request)
    {
        // todo implement
        return new Response();
    }

    public function terminate(Request $request, Response $response)
    {
        // @todo implement
        print $response;
    }
}
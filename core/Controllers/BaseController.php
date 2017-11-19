<?php

namespace core\Controllers;

use core\HttpComponent\Request;
use core\HttpComponent\Response;

class BaseController
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function homeAction() : Response
    {
        return new Response('Some new framework welcomes you.');
    }
}
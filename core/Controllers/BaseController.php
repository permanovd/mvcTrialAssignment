<?php

namespace core\Controllers;


use core\HttpComponent\Request;

class BaseController
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

}
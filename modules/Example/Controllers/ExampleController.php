<?php

namespace modules\Example\Controllers;

use core\Controllers\BaseController;
use core\HttpComponent\Response;

class ExampleController extends BaseController
{
    public function homeAction(): Response
    {
        return new Response('Some new framework welcomes you.');
    }

    public function indexAction(): Response
    {
        return new Response('Wow, index page.');
    }
}
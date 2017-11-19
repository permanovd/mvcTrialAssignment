<?php

namespace modules\Example\Controllers;

use core\Controllers\BaseController;
use core\HttpComponent\Response;

class ExampleController extends BaseController
{
    public function homeAction(): Response
    {
        return $this->renderView('Example:example:home', ['pageTitle' => 'Some new framework welcomes you.']);
    }

    public function indexAction(): Response
    {
        return $this->renderView('Example:example:home', ['pageTitle' => 'Wow, index page.']);
    }
}
<?php

namespace core\Application;

use core\Bootstrap\BootstrapService;
use core\HttpComponent\Request;
use core\HttpComponent\Response;

class Application
{
    /**
     * @param $components array
     */
    protected $components;

    public function __construct()
    {

    }

    /**
     * @param Request $request
     * @return Response
     */
    public function processRequest(Request $request)
    {
        // todo refactor to factory.
        $bootstrapService = new BootstrapService();
        $bootstrapService->bootstrap($this);

        // todo implement
        return new Response();
    }

    public function terminate(Request $request, Response $response)
    {
        // @todo implement
        print $response;
    }

    public function addComponent($componentShortcut, $component)
    {
        $this->components[$componentShortcut] = $component;
    }
}
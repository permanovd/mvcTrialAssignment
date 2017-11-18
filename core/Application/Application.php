<?php

namespace core\Application;

use core\ActionManager\ActionManager;
use core\Bootstrap\BootstrapService;
use core\HttpComponent\Request;
use core\HttpComponent\Response;

class Application
{
    /**
     * @param $components array
     */
    protected $components;
    protected $response;

    public function __construct()
    {

    }

    /**
     * @param Request $request
     * @return Response
     */
    public function processRequest(Request $request)
    {
        $response = new Response();
        $this->response = $response;
        // todo refactor to factory.
        $bootstrapService = new BootstrapService();
        $bootstrapService->bootstrap($this);

        $actionManager = new ActionManager();
        $action = $actionManager->locateAction();

        // Here goes pre/post-process and middleware.
        // todo implement.

        $data = $action->execute();
        $this->response->setData($data);

        // todo implement
        return $this->response;
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
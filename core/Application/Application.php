<?php

namespace core\Application;

use core\ActionManager\ActionManager;
use core\Bootstrap\BootstrapService;
use core\HttpComponent\Request;
use core\HttpComponent\Response;
use core\Routing\Route;
use core\Routing\RoutingService;

class Application
{
    /**
     * @param $components array
     */
    protected $components;
    protected $request;

    public function __construct()
    {

    }

    /**
     * @param Request $request
     * @return Response
     */
    public function processRequest(Request $request)
    {
        $this->request = $request;
        // todo refactor to factory.
        $bootstrapService = new BootstrapService();
        $bootstrapService->bootstrap($this);

        /** @var RoutingService $routingComponent */
        $routingComponent = $this->getComponent('routing');
        /** @var Route $currentRoute */
        $currentRoute = $routingComponent->getCurrentRoute($request);

        $actionManager = new ActionManager();
        $action = $actionManager->buildAction($currentRoute, $this->request);

        // Here goes pre/post-process and middleware.
        // todo implement.

        return $action->execute();
    }

    public function terminate(Request $request, Response $response)
    {
        // @todo implement
        print $response;
    }

    public function addComponent(IComponent $component)
    {
        $this->components[$component->getName()] = $component;
    }

    public function getComponent($componentName)
    {
        return $this->components[$componentName];
    }
}
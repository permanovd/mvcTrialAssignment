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

    private static $instance;

    public static function getInstance(): Application
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * @param $components array
     */
    protected $components;
    protected $request;

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
        $currentRoute = $routingComponent->getRequestedRoute($request);

        $actionManager = new ActionManager();
        $action = $actionManager->buildAction($currentRoute, $this->request);

        // Here goes pre/post-process and middleware.
        // todo implement.

        return $action->execute();
    }

    public function terminate(Request $request, Response $response)
    {
        // @todo implement header outputting and proper rendering of response.
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
<?php

namespace core\Routing;

use core\Application\Application;
use core\Application\IBootstrapableComponent;
use core\HttpComponent\Request;
use core\Module\ModuleManagementService;
use InvalidArgumentException;

class RoutingService implements IBootstrapableComponent
{
    /**
     * @property Route[]
     *
     * todo extract logic to class.
     */
    protected $routeCollection;

    public function register(Route $route)
    {
        // todo add route validation.
        $this->routeCollection[] = $route;
    }

    /**
     * @param Application $application
     */
    public function bootstrap(Application $application)
    {
        /** @var ModuleManagementService $moduleComponent */
        $moduleComponent = $application->getComponent('module');
        $filePaths = $moduleComponent->getDeclaredParameterFromAll('route_path');
        $filePaths[] = APP_DIR . '/appdata/routes.php';
        $routingService = $this;
        foreach ($filePaths as $filePath) {
            // todo here goes validation of route file.
            // or some other more elegant ways to do that.
            require_once $filePath;
        }
    }

    /**
     * @return mixed
     */
    public function getRouteCollection()
    {
        return $this->routeCollection;
    }

    public function getName(): string
    {
        return 'routing';
    }

    public function getRequestedRoute(Request $request)
    {
        $foundRoute = $this->findRoute($request);
        if ($foundRoute === null) {
            throw new InvalidArgumentException('Route is not found');
        }
        // Too much of responsibility for this class. Need to be refactored.
        return $foundRoute;
    }

    protected function findRoute(Request $request)
    {
        foreach ($this->routeCollection as $route) {
            if ($this->matchRoute($route, $request)) {
                return $route;
            }
        }
        return null;
    }

    private function matchRoute(Route $route, Request $request)
    {
        if ($route->getPath() === $request->getUri()) {
            return true;
        }
        return false;
    }
}
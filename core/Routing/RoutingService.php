<?php

namespace core\Routing;

use core\Application\IBootstrapableComponent;
use core\HttpComponent\Request;

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
     * @return RoutingService
     */
    public function bootstrap()
    {
        // TODO: Implement bootstrap() method.
        $filePaths = $this->getConfigurationFilePaths();
        $routingService = $this;
        foreach ($filePaths as $filePath) {
            // todo here goes validation of route file.
            // or some other more elegant ways to do that.
            require_once $filePath;
        }
        return $routingService;
    }

    /**
     * @return string[]
     */
    protected function getConfigurationFilePaths(): array
    {
        // todo implement route collecting logic. We've got to collect routes from components/modules.
        return [APP_DIR . '/appdata/routes.php'];
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

    public function getCurrentRoute(Request $request)
    {
        // Too much of responsibility for this class. Need to be refactored.
        return reset($this->routeCollection);
    }
}
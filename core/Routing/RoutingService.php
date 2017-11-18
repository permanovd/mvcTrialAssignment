<?php

namespace core\Routing;

use core\Application\IBootstrapableIComponent;

class RoutingService implements IBootstrapableIComponent
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
}
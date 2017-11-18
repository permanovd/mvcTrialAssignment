<?php

namespace core\Bootstrap;

use core\Application\Application;
use core\Application\IBootstrapableIComponent;
use core\Persistence\PersistenceService;
use core\Routing\RoutingService;

class BootstrapService
{
    public function bootstrap(Application $application)
    {
        $components = $this->findComponentsToBootstrap();
        // Bootstrap and then put every component into app object, so it can be accessed globally.
        // It will be very heavy object, but we dont have time for better solution.
        foreach ($components as $componentShortcut => $component) {
            $component->bootstrap();
            $application->addComponent($componentShortcut, $component);
        }
    }

    /**
     * @return IBootstrapableIComponent[]
     */
    private function findComponentsToBootstrap(): array
    {
        // Todo implement component contract.
        return [new RoutingService(), new PersistenceService()];
    }
}
<?php

namespace core\Bootstrap;

use core\Application\Application;
use core\Application\IBootstrapableComponent;
use core\Module\ModuleManagementService;
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
            $component->bootstrap($application);
            $application->addComponent($component);
        }
    }

    /**
     * @return IBootstrapableComponent[]
     */
    private function findComponentsToBootstrap(): array
    {
        // Todo implement component contract.
        return [
            new ModuleManagementService(),
            new RoutingService(),
            new PersistenceService()
        ];
    }
}
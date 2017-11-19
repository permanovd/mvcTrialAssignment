<?php

namespace core\Persistence;


use core\Application\Application;
use core\Application\IBootstrapableComponent;

class PersistenceService  implements IBootstrapableComponent
{

    public function bootstrap(Application $application)
    {
        // TODO: Implement bootstrap() method.
    }

    public function getName(): string
    {
        return 'persistence';
    }
}
<?php

namespace core\Application;

interface IBootstrapableComponent extends IComponent
{
    public function bootstrap(Application $application);
}
<?php

namespace core\Application;

interface IBootstrapableIComponent extends IComponent
{
    public function bootstrap();
}
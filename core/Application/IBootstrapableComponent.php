<?php

namespace core\Application;

interface IBootstrapableComponent extends Component
{
    public function bootstrap();
}
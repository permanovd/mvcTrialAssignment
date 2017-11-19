<?php

/** @var \core\Routing\RoutingService $routingService */
$routingService->register(
    new \core\Routing\Route(
        '',
        'Example:Example:home')
);

$routingService->register(
    new \core\Routing\Route(
        'example/index',
        'Example:Example:index')
);
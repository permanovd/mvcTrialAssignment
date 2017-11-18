<?php

require_once 'autoload.php';

$application = new \core\Application\Application();
$request = \core\HttpComponent\Request::createRequestObject();

$response = $application->processRequest($request);

$application->terminate($request, $response);
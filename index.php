<?php

require_once 'autoload.php';
define('APP_DIR', getcwd());

$application = new \core\Application\Application();
$request = \core\HttpComponent\Request::createRequestObject();

$response = $application->processRequest($request);

$application->terminate($request, $response);
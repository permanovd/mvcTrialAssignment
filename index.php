<?php

require_once 'autoload.php';
define('APP_DIR', getcwd());

$application = \core\Application\Application::getInstance();
$request = \core\HttpComponent\Request::createRequestObject();

$response = $application->processRequest($request);

$application->terminate($request, $response);
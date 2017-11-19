<?php

namespace core\Controllers;

use core\Application\Application;
use core\HttpComponent\Request;
use core\HttpComponent\Response;
use core\Persistence\EntityRepository;
use core\Views\ViewsManagementService;

class BaseController
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    protected function renderView($viewName, array $params = []): Response
    {
        /** @var ViewsManagementService $viewService */
        $viewService = Application::getInstance()->getComponent('view');
        $data = $viewService->render($viewName, $params);
        return new Response($data);
    }

    public function getRepository(string $entityName)
    {
        // todo implement repo singleton logic.
        $class = $entityName::getRepositoryClassName();
        return new $class();
    }
}
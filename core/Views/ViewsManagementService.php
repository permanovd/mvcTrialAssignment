<?php
/**
 * Created by PhpStorm.
 * User: David
 * Date: 19.11.2017
 * Time: 18:51
 */

namespace core\Views;


use core\Application\Application;
use core\Application\IBootstrapableComponent;

class ViewsManagementService implements IBootstrapableComponent
{

    public function getName(): string
    {
        return 'view';
    }


    public function bootstrap(Application $application)
    {
        // TODO: Implement bootstrap() method.
    }


    public function render($viewName, array $params = []): string
    {
        $filePath = $this->getFilePath($viewName);
        $renderingService = new ViewsRenderingService($filePath, $params);
        return $renderingService->getRendered();
    }

    private function getFilePath($viewName)
    {
        $schema = explode(':', $viewName);
        $moduleName = $schema[0];
        $catalogName = $schema[1];
        $fileName = $schema[2];

        $filePath = APP_DIR . '/' . 'modules' . '/' . $moduleName .
            '/' . 'Views' . '/' . $catalogName . '/' . $fileName . '.php';

        return $filePath;
    }


}
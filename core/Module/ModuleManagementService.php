<?php

namespace core\Module;

use core\Application\Application;
use core\Application\IBootstrapableComponent;

class ModuleManagementService implements IBootstrapableComponent
{

    protected $modules;

    public function bootstrap(Application $application)
    {
        // Here we've got to include and bootstrap all modules.
        $modules = [];
        require_once APP_DIR . '/config/modules.php';
        $moduleInfo = [];
        foreach ($modules as $module) {
            $routePath = APP_DIR . '/' . $module['path'] . '/appdata/routes.php';
            if (file_exists($routePath)) {
                $moduleInfo['route_path'] = $routePath;
            }

            $configPath = APP_DIR . '/' . $module['path'] . '/config/config.php';
            if (file_exists($configPath)) {
                $moduleInfo['config_path'] = $configPath;
            }

            $this->modules[] = $moduleInfo;
        }
    }

    public function getName(): string
    {
        return 'module';
    }

    protected function getAll()
    {
        return $this->modules;
    }

    public function getDeclaredParameterFromAll($paramName)
    {
        $result = [];
        foreach ($this->modules as $module) {
            if (isset($module[$paramName])) {
                $result[] = $module[$paramName];
            }
        }
        return $result;
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: David
 * Date: 19.11.2017
 * Time: 2:04
 */

namespace core\ActionManager;

use core\HttpComponent\Request;
use core\Routing\Route;

class ActionManager
{

    public function buildAction(Route $route, Request $request): Action
    {
        $methodName = $route->getMethodName();
        $path = explode(':', $methodName);
        $namespace = $path[0];
        $controllerName = $path[1] . 'Controller';
        $actionName = $path[2] . 'Action';

        if ($namespace !== 'core') {
            // Got config from module.
            $namespace = 'modules\\' . $namespace;
            $controllerName = 'Controllers\\' . $controllerName;
        }

        $controllerName = $namespace . '\\' . $controllerName;

        if (!class_exists($controllerName)) {
            return new NotFoundAction($request, '', '');
        }

        if (!method_exists($controllerName, $actionName)) {
            return new NotFoundAction($request, $controllerName, '');
        }

        return new Action($request, $controllerName, $actionName);
    }
}
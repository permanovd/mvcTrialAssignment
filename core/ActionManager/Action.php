<?php
/**
 * Created by PhpStorm.
 * User: David
 * Date: 19.11.2017
 * Time: 2:11
 */

namespace core\ActionManager;

use core\HttpComponent\Request;
use core\HttpComponent\Response;
use Exception;

class Action
{

    protected $actionSuffix = 'Action';

    /**
     * @var Request
     */
    private $request;
    /**
     * @var string
     */
    private $controllerName;
    /**
     * @var string
     */
    private $functionName;
    /**
     * @var array
     */
    private $params;

    public function __construct(
        Request $request,
        string $controllerName = '',
        string $functionName = '',
        array $params = array()
    ) {
        $this->request = $request;
        $this->controllerName = $controllerName;
        $this->functionName = $functionName;
        $this->params = $params;
    }

    public function execute(): Response
    {
        $hasParams = false;
        $controller = new $this->controllerName($this->request);
        $actionFuncName = $this->functionName;
        $response = new Response('');

        if (!empty($this->params)) {
            $hasParams = true;
        }

        try {
            if (!$hasParams) {
                $response = $controller->{$actionFuncName}();
            } else {
                $params = array_values($this->params);
                $response = \call_user_func_array(array($controller, $actionFuncName), $params);
            }


        } catch (Exception $exception) {
            // todo implement.
            $response->setData('Error: ' . $exception->getMessage());
        }
        return $response;
    }
}
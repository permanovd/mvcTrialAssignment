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

    public function __construct(Request $request, string $controllerName = '', string $functionName = '')
    {
        $this->request = $request;
        $this->controllerName = $controllerName;
        $this->functionName = $functionName;
    }

    public function execute(): Response
    {
        $controller = new $this->controllerName($this->request);
        $actionFuncName = $this->functionName;
        $response = new Response('');
        try {
            $response = $controller->{$actionFuncName}();
        } catch (Exception $exception) {
            // todo implement.
            $response->setData('Error: ' . $exception->getMessage());
        }
        return $response;
    }
}
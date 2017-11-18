<?php

namespace core\Routing;


class Route
{

    private $path;
    private $methodName;

    public function __construct($path, $methodName, $params)
    {
        // todo implement logic
        $this->path = $path;
        $this->methodName = $methodName;
    }

    /**
     * @return mixed
     */
    public function getMethodName()
    {
        return $this->methodName;
    }

}
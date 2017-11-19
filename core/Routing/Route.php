<?php

namespace core\Routing;


class Route
{


    const TYPE_STATIC = 0;
    const TYPE_DYNAMIC = 1;

    protected $path;
    protected $methodName;
    /**
     * @var array
     */
    protected $params;

    public function __construct($path, $methodName, array $params = [])
    {
        // todo implement logic
        $this->path = $path;
        $this->methodName = $methodName;
        $this->params = $params;
    }

    /**
     * @return mixed
     */
    public function getMethodName()
    {
        return $this->methodName;
    }

    /**
     * @return mixed
     */
    public function getPath()
    {
        return $this->path;
    }

    public function getParams(string $uri): array
    {
        return $this->params;
    }


    public function getType(): int
    {
        return self::TYPE_STATIC;
    }

    public function pathMatch($uri)
    {
        return $this->path === $uri;
    }
}
<?php

namespace core\HttpComponent;


class Response
{

    private $data;
    /**
     * @var array
     */
    private $headers;

    public function __construct(string $data, array $headers = [])
    {
        $this->data = $data;
        $this->headers = $headers;
    }

    public function __toString()
    {
        return $this->data;
    }

    public function setData($data)
    {
        if ($data instanceof static) {
            return $data;
        }
    }
}
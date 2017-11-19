<?php
/**
 * Created by PhpStorm.
 * User: David
 * Date: 19.11.2017
 * Time: 18:55
 */

namespace core\Views;


class ViewsRenderingService
{

    private $filePath;
    private $params;

    public function __construct($filePath, $params)
    {

        $this->filePath = $filePath;
        $this->params = $params;
    }

    public function getRendered()
    {
        extract($this->params, EXTR_SKIP);
        ob_start();

        require $this->filePath;
        return ob_get_clean();
    }

}
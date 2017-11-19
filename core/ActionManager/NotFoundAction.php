<?php
/**
 * Created by PhpStorm.
 * User: David
 * Date: 19.11.2017
 * Time: 2:43
 */

namespace core\ActionManager;


use core\HttpComponent\Request;
use core\HttpComponent\Response;

class NotFoundAction extends Action
{
    public function execute(): Response
    {
        return new Response('Action is not found');
    }

}
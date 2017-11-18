<?php
/**
 * Created by PhpStorm.
 * User: David
 * Date: 19.11.2017
 * Time: 2:04
 */

namespace core\ActionManager;


class ActionManager
{

    public function locateAction(): Action
    {
        return new Action();
    }
}
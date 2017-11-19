<?php

namespace modules\Example\Controllers;

use core\Controllers\BaseController;
use core\HttpComponent\Response;
use modules\Example\Entity\Example;

class ExampleController extends BaseController
{
    public function homeAction(): Response
    {

        return $this->renderView('Example:example:home', ['pageTitle' => 'Some new framework welcomes you.']);
    }

    public function indexAction(): Response
    {
        return $this->renderView('Example:example:home', ['pageTitle' => 'Wow, index page.']);
    }

    public function viewAction($id): Response
    {
        $repo = $this->getRepository(Example::class);
        $entity = $repo->findOne($id);
        return $this->renderView('Example:example:view',
            [
                'pageTitle' => 'Wow, view page id is ' . $id . '.',
                'entity' => $entity
            ]);
    }
}
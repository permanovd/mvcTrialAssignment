<?php
/**
 * Created by PhpStorm.
 * User: David
 * Date: 19.11.2017
 * Time: 21:52
 */

namespace modules\Example\Persistence;


use core\Entity\Entity;
use core\Persistence\EntityRepository;
use modules\Example\Entity\Example;

class ExampleRepository extends EntityRepository
{

    public function findOne(int $id): Entity
    {
        $entity = new Example();
        $entity->id = 1;
        $entity->name = 'first  example';
        $entity->description = 'ooooh, the first hardcoded entity instance. Nice.';
        return $entity;
    }
}
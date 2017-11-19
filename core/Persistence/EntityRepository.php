<?php

namespace core\Persistence;


use core\Entity\Entity;

class EntityRepository implements IRepository
{

    public function commit()
    {
        // TODO: Implement commit() method.
    }

    public function persist(Entity $entity)
    {
        // TODO: Implement persist() method.
    }

    public function findOne(int $id) : Entity
    {
        // TODO: Implement findOne() method.
    }

    public function find(array $conditions = [])
    {
        // TODO: Implement find() method.
    }
}
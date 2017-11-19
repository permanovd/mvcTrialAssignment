<?php

namespace core\Persistence;


use core\Entity\Entity;

interface IRepository
{
    public function commit();

    public function persist(Entity $entity);

    public function findOne(int $id);

    public function find(array $conditions = []);
}
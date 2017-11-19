<?php
/**
 * Created by PhpStorm.
 * User: David
 * Date: 19.11.2017
 * Time: 21:48
 */

namespace core\Entity;


use core\Persistence\EntityRepository;

class Entity
{
    public static function getRepositoryClassName(): string
    {
        return EntityRepository::class;
    }
}
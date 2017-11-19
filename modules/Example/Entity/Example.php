<?php
/**
 * Created by PhpStorm.
 * User: David
 * Date: 19.11.2017
 * Time: 21:54
 */

namespace modules\Example\Entity;


use core\Entity\Entity;
use modules\Example\Persistence\ExampleRepository;

class Example extends Entity
{

    public $id;
    public $name;
    public $description;
    public $dateOfCreation;

    public static function getRepositoryClassName(): string
    {
        return ExampleRepository::class;
    }

}
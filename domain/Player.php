<?php
namespace GravillonPapierCiseauxPuits\domain;

use GravillonPapierCiseauxPuits\interfaces\PlayerInterface;

class Player implements PlayerInterface
{
    private $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

}
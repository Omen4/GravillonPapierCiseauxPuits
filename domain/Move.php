<?php
namespace GravillonPapierCiseauxPuits\domain;

use GravillonPapierCiseauxPuits\interfaces\MoveInterface;

class Move implements MoveInterface
{
    private $value;

    public function __construct($value)
    {
        $this->value = $value;
    }

    public function getValue()
    {
        return $this->value;
    }
}

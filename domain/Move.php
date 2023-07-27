<?php
namespace domain;

use interfaces\MoveInterface;

class Move implements MoveInterface
{
    private Move $value;

    public function __construct($value)
    {
        $this->value = $value;
    }

    public function getValue()
    {
        return $this->value;
    }
}

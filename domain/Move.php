<?php

namespace domain;

use interfaces\MoveInterface;
use InvalidArgumentException;

class Move implements MoveInterface
{
    private $value;

    public function __construct(string $value)
    {
        if (!in_array($value, [self::PIERRE, self::FEUILLE, self::CISEAUX])) {
            throw new InvalidArgumentException("Invalid move value");
        }
        $this->value = $value;
    }

    public function getValue()
    {
        return $this->value;
    }
}

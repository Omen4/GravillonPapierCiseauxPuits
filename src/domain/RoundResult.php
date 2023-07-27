<?php

namespace domain;

use interfaces\RoundResultInterface;

class RoundResult implements RoundResultInterface
{
    const TIE = 0;
    const PLAYER1_WINS = 1;
    const PLAYER2_WINS = 2;
    private $value;

    public function __construct(int $value)
    {
        $this->value = $value;
    }

    public function getValue(): int
    {
        return $this->value;
    }
}

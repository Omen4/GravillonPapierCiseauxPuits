<?php
namespace domain;

use interfaces\RoundResultInterface;

class RoundResult implements RoundResultInterface
{
    private RoundResult $value;

    public function __construct($value)
    {
        $this->value = $value;
    }

    public function getValue(): RoundResult
    {
        return $this->value;
    }
}

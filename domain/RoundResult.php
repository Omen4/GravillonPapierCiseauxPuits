<?php
namespace GravillonPapierCiseauxPuits\domain;

use GravillonPapierCiseauxPuits\interfaces\RoundResultInterface;

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

<?php
namespace GravillonPapierCiseauxPuits\domain;

use GravillonPapierCiseauxPuits\interfaces\RoundResultInterface;

class RoundResult implements RoundResultInterface
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

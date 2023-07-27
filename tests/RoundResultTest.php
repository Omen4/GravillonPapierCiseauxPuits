<?php

use domain\RoundResult;
use PHPUnit\Framework\TestCase;

class RoundResultTest extends TestCase
{
    public function testGetValue()
    {
        $result = new RoundResult(1);
        $this->assertEquals(1, $result->getValue());
    }
}

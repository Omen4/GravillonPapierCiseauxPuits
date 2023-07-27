<?php

use domain\Move;
use PHPUnit\Framework\TestCase;

class MoveTest extends TestCase
{
    public function testGetValue()
    {
        $move = new Move('Pierre');
        $this->assertEquals('Pierre', $move->getValue());
    }
}

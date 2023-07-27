<?php

use domain\Player;
use PHPUnit\Framework\TestCase;

class PlayerTest extends TestCase
{
    public function testGetName()
    {
        $player = new Player('John');
        $this->assertEquals('John', $player->getName());
    }
}

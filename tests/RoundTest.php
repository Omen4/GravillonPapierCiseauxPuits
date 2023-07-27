<?php

use domain\Move;
use domain\Round;
use domain\RoundResult;
use PHPUnit\Framework\TestCase;

class RoundTest extends TestCase
{
    public function testGetters()
    {
        $player1Move = new Move('Pierre');
        $player2Move = new Move('Ciseaux');
        $result = new RoundResult(1);
        $round = new Round($player1Move, $player2Move, $result);

        $this->assertSame($player1Move, $round->getPlayer1Move());
        $this->assertSame($player2Move, $round->getPlayer2Move());
        $this->assertSame($result, $round->getResult());
    }
}

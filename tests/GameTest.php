<?php

use domain\Move;
use domain\Player;
use PHPUnit\Framework\TestCase;
use services\Game;

class GameTest extends TestCase
{
    public function testGetters()
    {
        $player1 = new Player('John');
        $player2 = new Player('Alice');
        $game = new Game($player1, $player2);

        $this->assertSame($player1, $game->getPlayer1());
        $this->assertSame($player2, $game->getPlayer2());
    }

    public function testPlayRound()
    {
        $player1 = new Player('John');
        $player2 = new Player('Alice');
        $game = new Game($player1, $player2);

        $player1Move = new Move('Pierre');
        $player2Move = new Move('Ciseaux');

        $game->playRound($player1Move, $player2Move);

        $roundsHistory = $game->getRoundsHistory();
        $this->assertCount(1, $roundsHistory);
    }
}

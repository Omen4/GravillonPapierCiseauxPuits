<?php
namespace interfaces;
interface GameInterface
{
    public function getPlayer1();
    public function getPlayer2();
    public function simulateRandomMove();
    public function playRound ($player1Move, $player2Move);
    public function getWinner();
    public function getRoundsHistory();
}

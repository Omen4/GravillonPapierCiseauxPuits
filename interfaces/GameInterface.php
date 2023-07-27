<?php
namespace GravillonPapierCiseauxPuits\interfaces;
interface GameInterface
{
    public function getPlayer1();
    public function getPlayer2();
    public function simulateRandomMove();
    public function playRound(MoveInterface $player1Move, MoveInterface $player2Move);
    public function getWinner();
    public function getRoundsHistory();
}

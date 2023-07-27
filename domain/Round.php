<?php
namespace GravillonPapierCiseauxPuits\domain;

use GravillonPapierCiseauxPuits\interfaces\RoundInterface;

class Round implements RoundInterface
{
    private $player1Move;
    private $player2Move;
    private $result;

    public function __construct(Move $player1Move, Move $player2Move, RoundResult $result)
    {
        $this->player1Move = $player1Move;
        $this->player2Move = $player2Move;
        $this->result = $result;
    }

    public function getPlayer1Move()
    {
        return $this->player1Move;
    }

    public function getPlayer2Move()
    {
        return $this->player2Move;
    }

    public function getResult()
    {
        return $this->result;
    }
}

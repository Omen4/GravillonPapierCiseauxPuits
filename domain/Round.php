<?php
namespace domain;

use interfaces\RoundInterface;

class Round implements RoundInterface
{
    private Move $player1Move;
    private Move $player2Move;
    private RoundResult $result;

    public function __construct(Move $player1Move, Move $player2Move, RoundResult $result)
    {
        $this->player1Move = $player1Move;
        $this->player2Move = $player2Move;
        $this->result = $result;
    }

    public function getPlayer1Move(): Move
    {
        return $this->player1Move;
    }

    public function getPlayer2Move(): Move
    {
        return $this->player2Move;
    }

    public function getResult(): RoundResult
    {
        return $this->result;
    }
}

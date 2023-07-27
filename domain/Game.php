<?php
namespace GravillonPapierCiseauxPuits\domain;

use GravillonPapierCiseauxPuits\interfaces\GameInterface;
use GravillonPapierCiseauxPuits\interfaces\MoveInterface;
use GravillonPapierCiseauxPuits\interfaces\PlayerInterface;

class Game implements GameInterface, MoveInterface, PlayerInterface
{
    private $player1;
    private $player2;
    private $player1Wins = 0;
    private $player2Wins = 0;
    private $rounds = [];

    public function __construct(PlayerInterface $player1, PlayerInterface $player2)
    {
        $this->player1 = $player1;
        $this->player2 = $player2;
    }

    public function getPlayer1()
    {
        return $this->player1;
    }

    public function getPlayer2()
    {
        return $this->player2;
    }

    public function simulateRandomMove()
    {
        $moves = ['Pierre', 'Feuille', 'Ciseaux'];
        return new Move($moves[array_rand($moves)]);
    }

    public function playRound(MoveInterface $player1Move, MoveInterface $player2Move)
    {
        $result = $this->determineRoundResult($player1Move, $player2Move);
        $this->rounds[] = new Round($player1Move, $player2Move, $result);

        if ($result->getValue() === 1) {
            $this->player1Wins++;
        } elseif ($result->getValue() === 2) {
            $this->player2Wins++;
        }
    }

    private function determineRoundResult(MoveInterface $player1Move, MoveInterface $player2Move)
    {
        if ($player1Move->getValue() === $player2Move->getValue()) {
            return new RoundResult(0); // Tie
        }

        // Player 1 wins
        if (
            ($player1Move->getValue() === 'Pierre' && $player2Move->getValue() === 'Ciseaux') ||
            ($player1Move->getValue() === 'Feuille' && $player2Move->getValue() === 'Pierre') ||
            ($player1Move->getValue() === 'Ciseaux' && $player2Move->getValue() === 'Feuille')
        ) {
            return new RoundResult(1);
        }

        // Player 2 wins
        return new RoundResult(2);
    }

    public function getWinner()
    {
        if ($this->player1Wins >= 2) {
            return 1;
        } elseif ($this->player2Wins >= 2) {
            return 2;
        }

        return 0;
    }

    public function getRoundsHistory()
    {
        return $this->rounds;
    }

    public function getValue()
    {
        // TODO: Implement getValue() method.
    }

    public function getName()
    {
        // TODO: Implement getName() method.
    }
}

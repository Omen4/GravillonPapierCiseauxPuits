<?php

use GravillonPapierCiseauxPuits\domain\Move;
use GravillonPapierCiseauxPuits\domain\Player;
use GravillonPapierCiseauxPuits\domain\Round;
use GravillonPapierCiseauxPuits\domain\RoundResult;
use GravillonPapierCiseauxPuits\interfaces\GameInterface;

require_once 'interfaces/GameInterface.php';

class Game implements GameInterface
{
    private Player $player1;
    private Player $player2;
    private int $player1Wins = 0;
    private int $player2Wins = 0;
    private array $rounds = [];

    public function __construct(Player $player1, Player $player2)
    {
        $this->player1 = $player1;
        $this->player2 = $player2;
    }

    public function getPlayer1(): Player
    {
        return $this->player1;
    }

    public function getPlayer2(): Player
    {
        return $this->player2;
    }

    public function simulateRandomMove(): Move
    {
        $moves = ['Pierre', 'Feuille', 'Ciseaux'];
        return new Move($moves[array_rand($moves)]);
    }

    public function playRound(Move $player1Move, Move $player2Move): void
    {
        $result = $this->determineRoundResult($player1Move, $player2Move);
        $this->rounds[] = new Round($player1Move, $player2Move, $result);

        if ($result->getValue() === 1) {
            $this->player1Wins++;
        } elseif ($result->getValue() === 2) {
            $this->player2Wins++;
        }
    }

    private function determineRoundResult(Move $player1Move, Move $player2Move): RoundResult
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

    public function getWinner(): int
    {
        if ($this->player1Wins >= 2) {
            return 1;
        } elseif ($this->player2Wins >= 2) {
            return 2;
        }

        return 0;
    }

    public function getRoundsHistory(): array
    {
        return $this->rounds;
    }
}

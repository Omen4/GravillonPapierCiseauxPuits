<?php

namespace domain;

use interfaces\GameInterface;
use repositories\GameRepository;

class Game implements GameInterface
{
    private $player1;
    private $player2;
    private $roundsHistory = [];
    private $repository;

    public function __construct(Player $player1, Player $player2, GameRepository $repository)
    {
        $this->player1 = $player1;
        $this->player2 = $player2;
        $this->repository = $repository;
    }

    public function getPlayer1(): Player
    {
        return $this->player1;
    }

    public function getPlayer2(): Player
    {
        return $this->player2;
    }

    public function playRound( $player1Move, $player2Move)
    {
        $result = $this->calculateRoundResult($player1Move, $player2Move);
        $round = new Round($player1Move, $player2Move, $result);
        $this->roundsHistory[] = $round;

        //Save kikis
        $this->repository->saveRoundResult(
            $player1Move->getValue(),
            $player2Move->getValue(),
            $result->getValue()
        );
    }

    public function getRoundsHistory(): array
    {
        return $this->roundsHistory;
    }

    public function getWinner(): int
    {
        $player1Wins = 0;
        $player2Wins = 0;

        foreach ($this->roundsHistory as $round) {
            $result = $round->getResult()->getValue();
            if ($result === RoundResult::PLAYER1_WINS) {
                $player1Wins++;
            } elseif ($result === RoundResult::PLAYER2_WINS) {
                $player2Wins++;
            }
        }

        if ($player1Wins >= 2) {
            return 1;
        } elseif ($player2Wins >= 2) {
            return 2;
        } else {
            return 0;
        }
    }

    private function calculateRoundResult(MoveInterface $player1Move, MoveInterface $player2Move): RoundResultInterface
    {
        switch ($player1Move->getValue()) {
            case Move::PIERRE:
                switch ($player2Move->getValue()) {
                    case Move::PIERRE:
                        return new RoundResult(RoundResult::TIE);
                    case Move::FEUILLE:
                        return new RoundResult(RoundResult::PLAYER2_WINS);
                    case Move::CISEAUX:
                        return new RoundResult(RoundResult::PLAYER1_WINS);
                }
                break;

            case Move::FEUILLE:
                switch ($player2Move->getValue()) {
                    case Move::PIERRE:
                        return new RoundResult(RoundResult::PLAYER1_WINS);
                    case Move::FEUILLE:
                        return new RoundResult(RoundResult::TIE);
                    case Move::CISEAUX:
                        return new RoundResult(RoundResult::PLAYER2_WINS);
                }
                break;

            case Move::CISEAUX:
                switch ($player2Move->getValue()) {
                    case Move::PIERRE:
                        return new RoundResult(RoundResult::PLAYER2_WINS);
                    case Move::FEUILLE:
                        return new RoundResult(RoundResult::PLAYER1_WINS);
                    case Move::CISEAUX:
                        return new RoundResult(RoundResult::TIE);
                }
                break;
        }
    }



    public function simulateRandomMove()
    {
        // TODO: Implement simulateRandomMove() method.
    }
}

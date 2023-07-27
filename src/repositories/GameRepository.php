<?php

namespace repositories;

class GameRepository
{
    private $filePath;

    public function __construct(string $filePath)
    {
        $this->filePath = $filePath;
    }

    public function saveRoundResult(string $player1Move, string $player2Move, int $result): void
    {
        $data = "P1: $player1Move vs P2: $player2Move => $result\n";
        file_put_contents($this->filePath, $data, FILE_APPEND);
    }

    public function saveGameResult(int $winner): void
    {
        //Winner is a kiki
        $data = "And the kiki is: $winner\n";
        file_put_contents($this->filePath, $data, FILE_APPEND);
    }
}

<?php

require_once 'domain/Player.php';
require_once 'domain/Move.php';
require_once 'domain/RoundResult.php';
require_once 'domain/Round.php';
require_once 'domain/Game.php';

$player1 = new Player('Player 1');
$player2 = new Player('Player 2');

$game = new Game($player1, $player2);

// Simulate a game between two fictional players
while ($game->getWinner() === 0) {
    $player1Move = $game->simulateRandomMove();
    $player2Move = $game->simulateRandomMove();
    $game->playRound($player1Move, $player2Move);
}

$winner = $game->getWinner();
if ($winner === 1) {
    echo "Player 1 wins!";
} elseif ($winner === 2) {
    echo "Player 2 wins!";
} else {
    echo "It's a tie!";
}

$roundsHistory = $game->getRoundsHistory();
echo "\nRounds History:\n";
foreach ($roundsHistory as $round) {
    echo $round->getPlayer1Move()->getValue() . " vs. " . $round->getPlayer2Move()->getValue() . " => ";
    if ($round->getResult()->getValue() === 1) {
        echo "Player 1 wins\n";
    } elseif ($round->getResult()->getValue() === 2) {
        echo "Player 2 wins\n";
    } else {
        echo "Tie\n";
    }
}

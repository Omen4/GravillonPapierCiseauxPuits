<?php

require_once 'domain/Player.php';
require_once 'domain/Move.php';
require_once 'domain/RoundResult.php';
require_once 'domain/Round.php';
require_once 'domain/Game.php';

$player1 = new Player('Player 1');
$player2 = new Player('Player 2');

$game = new Game($player1, $player2);

// ... le reste du code reste inchangé ...

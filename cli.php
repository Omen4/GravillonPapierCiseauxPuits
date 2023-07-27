<?php
require_once 'vendor/autoload.php';

use domain\Game;
use domain\Move;
use domain\Player;
use repositories\GameRepository;

function getValidMove(): Move
{
    while (true) {
        echo "Veuillez choisir votre signe (Pierre, Feuille, Ciseaux) : \n";
        $input = trim(fgets(STDIN));

        if (in_array($input, ['Pierre', 'Feuille', 'Ciseaux'])) {
            return new Move($input);
        }

        echo "Choix invalide. Veuillez choisir l'un des signes suivants : Pierre, Feuille, Ciseaux.\n";
    }
}

function playGame()
{
    echo "Bienvenue dans le jeu Pierre, Feuille, Ciseaux !\n";

    $player1 = new Player('Joueur');
    $player2 = new Player('Adversaire fictif');
    $repository = new GameRepository('game_results.txt');
    $game = new Game($player1, $player2, $repository);

    $roundNumber = 1;
    while ($game->getWinner() === 0) {
        echo "\nManche $roundNumber\n";

        $userMove = getValidMove();
        $computerMove = $game->getRandomMove();

        $game->playRound($userMove, $computerMove);

        echo "Vous avez choisi : " . $userMove->getValue() . "\n";
        echo "Adversaire fictif a choisi : " . $computerMove->getValue() . "\n";

        $result = $game->getRoundsHistory()[count($game->getRoundsHistory()) - 1]->getResult()->getValue();
        if ($result === 1) {
            echo "Vous gagnez cette manche !\n";
        } elseif ($result === 2) {
            echo "Adversaire fictif gagne cette manche !\n";
        } else {
            echo "C'est une égalité !\n";
        }

        $roundNumber++;
    }

    $winner = $game->getWinner();
    if ($winner === 1) {
        echo "Vous avez gagné la partie ! Félicitations !\n";
    } elseif ($winner === 2) {
        echo "Adversaire fictif a gagné la partie ! Essayez encore !\n";
    } else {
        echo "La partie s'est terminée par une égalité !\n";
    }
}

playGame();
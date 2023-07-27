<?php

use domain\Move;
use interfaces\MoveInterface;
use PHPUnit\Framework\TestCase;

class MoveTest extends TestCase
{
    public function testValidMoves()
    {
        $pierre = new Move(MoveInterface::PIERRE);
        $this->assertEquals('Pierre', $pierre->getValue());

        $feuille = new Move(MoveInterface::FEUILLE);
        $this->assertEquals('Feuille', $feuille->getValue());

        $ciseaux = new Move(MoveInterface::CISEAUX);
        $this->assertEquals('Ciseaux', $ciseaux->getValue());
    }

    public function testInvalidMove()
    {
        $this->expectException(InvalidArgumentException::class);
        new Move('Invalid');
    }
}

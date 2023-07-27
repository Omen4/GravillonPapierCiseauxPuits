<?php

namespace interfaces;
interface MoveInterface
{
    const PIERRE = 'Pierre';
    const FEUILLE = 'Feuille';
    const CISEAUX = 'Ciseaux';

    public function getValue();
}

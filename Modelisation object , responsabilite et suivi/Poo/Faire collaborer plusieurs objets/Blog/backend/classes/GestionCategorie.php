<?php

require_once __DIR__ . '/Categorie.php';

class GestionCategorie
{
    public function getAll(): array
    {
        $categorie1 = new Categorie(1, "Informatique", "blue", "laptop");
        $categorie2 = new Categorie(2, "Sport", "green", "football");

        return [$categorie1, $categorie2];
    }
}
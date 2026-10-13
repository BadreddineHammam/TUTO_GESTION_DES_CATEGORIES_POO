<?php

require_once __DIR__ . '/User.php';

class Auteur extends User
{
    private $nom;
    private $prenom;
    private $biographie;

    public function getRoleName(): string
    {
        return "Auteur publié";
    }
}
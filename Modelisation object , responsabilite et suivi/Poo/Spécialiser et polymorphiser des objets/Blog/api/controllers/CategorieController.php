<?php

require_once __DIR__ . '/../../backend/classes/GestionCategorie.php';
require_once __DIR__ . '/../../backend/classes/User.php';
require_once __DIR__ . '/../../backend/classes/Auteur.php';

// Test categories
$gestionCategorie = new GestionCategorie();

$categories = $gestionCategorie->getAll();

echo "<h2>Categories</h2>";

foreach ($categories as $categorie) {
    echo $categorie->getNom() . "<br>";
}

// Test polymorphism
$users = [
    new User(),
    new Auteur()
];

echo "<h2>User Roles</h2>";

foreach ($users as $user) {
    echo $user->getRoleName() . "<br>";
}
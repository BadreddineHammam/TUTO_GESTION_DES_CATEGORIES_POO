<?php

header('Content-Type: application/json');

$fichier = __DIR__ . '/categories.json';

$categories = file_exists($fichier)
    ? json_decode(file_get_contents($fichier), true)
    : [];

$methode = $_SERVER['REQUEST_METHOD'];

$body = json_decode(file_get_contents('php://input'), true);



if ($methode === 'GET') {

    echo json_encode([
        'success' => true,
        'data' => $categories
    ]);




} elseif ($methode === 'POST') {

    $body['id'] = time();

    $categories[] = $body;

    file_put_contents(
        $fichier,
        json_encode($categories, JSON_PRETTY_PRINT)
    );

    echo json_encode([
        'success' => true,
        'message' => 'Catégorie ajoutée',
        'data' => $body
    ]);




} elseif ($methode === 'PUT') {

    foreach ($categories as $i => $categorie) {

        if ($categorie['id'] == $body['id']) {

            $categories[$i] = $body;
        }
    }

    file_put_contents(
        $fichier,
        json_encode($categories, JSON_PRETTY_PRINT)
    );

    echo json_encode([
        'success' => true,
        'message' => 'Catégorie modifiée',
        'data' => $body
    ]);




} elseif ($methode === 'DELETE') {

    foreach ($categories as $i => $categorie) {

        if ($categorie['id'] == $body['id']) {

            unset($categories[$i]);
        }
    }

    $categories = array_values($categories);

    file_put_contents(
        $fichier,
        json_encode($categories, JSON_PRETTY_PRINT)
    );

    echo json_encode([
        'success' => true,
        'message' => 'Catégorie supprimée',
        'data' => $categories
    ]);



} else {

    echo json_encode([
        'success' => false,
        'message' => 'Méthode HTTP non autorisée'
    ]);
}
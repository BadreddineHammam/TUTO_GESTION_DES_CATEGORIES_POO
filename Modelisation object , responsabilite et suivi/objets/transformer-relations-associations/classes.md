classDiagram
    class Categorie {
        -int id
        -string nom
        -string couleur
        -string icone
    }

    class User {
        -int id
        -string email
        -string mot_de_passe
        -string role
    }

    class Auteur {
        -int id
        -string nom
        -string prenom
        -string biographie
        -string avatar
    }

    class Article {
        -int id
        -string titre
        -string contenu
        -string statut
        -DateTime date_creation
    }

    User "1" -- "0..1" Auteur : possède
    Auteur "1" -- "0..*" Article : rédige
    Categorie "1" -- "0..*" Article : contient
**Condition (Erreur)** : l’Auteur ne saisit aucun contenu avant de valider.
**Scénario d’erreur** :
1. L’Auteur clique sur le bouton “Enregistrer l’article”.
1. Le système refuse l’enregistrement et affiche le message d’erreur “Le contenu est obligatoire”.
**Reprise** : L’Auteur remplit le champ contenu 

**___________________________________________________________________________________________________**
**Condition (Alternatif)** : l’Auteur sélectionne le statut “Draft” au lieu de “Publié”.
**Scénario alternatif** :
1. L’Auteur clique sur le bouton “Enregistrer l’article”.
1. Le système sauvegarde l’article dans la base de données avec le statut "Draft".
1. Le système redirige l’Auteur vers la liste des articles.
**Fin du scénario** : l’article est enregistré, mais non visible par les visiteurs

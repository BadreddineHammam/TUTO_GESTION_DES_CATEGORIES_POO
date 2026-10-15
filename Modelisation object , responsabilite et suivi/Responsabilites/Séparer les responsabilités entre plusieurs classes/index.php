<?php
require_once __DIR__ . '/backend/classes/GestionCategorie.php';

$gestion = new GestionCategorie();

// Handle forms
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';

    if ($action === 'create') {
        $gestion->createCategorie(
            $_POST['nom'],
            $_POST['couleur'],
            $_POST['icone']
        );
    }

    if ($action === 'update') {
        $gestion->updateCategorie(
            (int) $_POST['id'],
            $_POST['nom'],
            $_POST['couleur'],
            $_POST['icone']
        );
    }

    if ($action === 'delete') {
        $gestion->deleteCategorie((int) $_POST['id']);
    }

    // Reload the page after an action
    header('Location: index.php');
    exit;
}

// Read categories
$categories = $gestion->getAll();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Gestion des catégories</title>
    <style>
        body {
            font-family: Arial;
            margin: 30px;
            background: #f4f4f4;
        }

        .card {
            background: white;
            padding: 15px;
            margin: 15px 0;
            border-radius: 8px;
        }

        input, button {
            padding: 8px;
            margin: 5px 0;
        }

        button {
            cursor: pointer;
        }
    </style>
</head>
<body>

<h1>Gestion des catégories</h1>

<h2>Ajouter une catégorie</h2>

<form method="POST">
    <input type="hidden" name="action" value="create">

    <input name="nom" placeholder="Nom" required>
    <input name="couleur" placeholder="Couleur" required>
    <input name="icone" placeholder="Icône" required>

    <button type="submit">Ajouter</button>
</form>

<hr>

<h2>Liste des catégories</h2>

<?php foreach ($categories as $cat): ?>
    <div class="card">
        <p>ID : <?= $cat->getId() ?></p>

        <form method="POST">
            <input type="hidden" name="action" value="update">
            <input type="hidden" name="id"
                   value="<?= $cat->getId() ?>">

            <input name="nom"
                   value="<?= htmlspecialchars($cat->getNom()) ?>"
                   required>

            <input name="couleur"
                   value="<?= htmlspecialchars($cat->getCouleur()) ?>"
                   required>

            <input name="icone"
                   value="<?= htmlspecialchars($cat->getIcone()) ?>"
                   required>

            <button type="submit">Modifier</button>
        </form>

        <form method="POST"
              onsubmit="return confirm('Supprimer cette catégorie ?')">

            <input type="hidden" name="action" value="delete">
            <input type="hidden" name="id"
                   value="<?= $cat->getId() ?>">

            <button type="submit">Supprimer</button>
        </form>
    </div>
<?php endforeach; ?>

<?php if (empty($categories)): ?>
    <p>Aucune catégorie. Ajoutez-en une ci-dessus.</p>
<?php endif; ?>

</body>
</html>

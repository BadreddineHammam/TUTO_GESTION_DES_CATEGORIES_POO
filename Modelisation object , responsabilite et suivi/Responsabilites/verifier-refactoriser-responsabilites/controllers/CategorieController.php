<?php
require_once '../backend/classes/GestionCategorie.php';
header('Content-Type: application/json');
class CategorieController {
    public function listerCategories(): void {
        $gestion = new GestionCategorie();
        $categories = $gestion->getAll();
        $data = [];
        foreach ($categories as $cat) {
            $data[] = [
                'id' => $cat->getId(),
                'nom' => $cat->getNom(),
                'couleur' => $cat->getCouleur(),
                'icone' => $cat->getIcone()
            ];
        }
        echo json_encode($data);
    }
}

$controller = new CategorieController();
$controller->listerCategories();
?>

<?php

require_once __DIR__ . "/Categorie.php";

class GestionCategorie
{
    private string $file;

    public function __construct()
    {
        $this->file = __DIR__ . "/../data/categories.json";
    }

    public function getAll(): array
    {
        $content = file_get_contents($this->file);

        return json_decode($content, true) ?? [];
    }

    public function add(string $name): array //function returns an array containing the new category's id and name.
    {
        $categories = $this->getAll();

        foreach ($categories as $category) 
        {
            if (strcasecmp($category["name"], $name) === 0) 
            {
                throw new Exception("Category already exists.");
            }
        }

        $ids = array_column($categories, "id"); //means extract all the id values from the $categories array and put them into a new array called $ids.
        $id = empty($ids) ? 1 : max($ids) + 1; //max($ids) + 1	Find the largest ID and add 1.

        $categorie = new Categorie($id, $name);

        $categories[] = $categorie->toArray();

        file_put_contents(
            $this->file,
            json_encode($categories, JSON_PRETTY_PRINT),
            LOCK_EX
        );

        return $categorie->toArray();
    }
}

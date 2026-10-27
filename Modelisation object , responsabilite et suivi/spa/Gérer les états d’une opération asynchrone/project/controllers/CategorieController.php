
<?php

header("Content-Type: application/json; charset=UTF-8");
header("Cache-Control: no-store, no-cache, must-revalidate");

require_once __DIR__ . "/../backend/classes/GestionCategorie.php";

try 
{
    $gestion = new GestionCategorie();

    if ($_SERVER["REQUEST_METHOD"] === "GET")
    {
        echo json_encode($gestion->getAll());
        exit;
    }

    if ($_SERVER["REQUEST_METHOD"] !== "POST") 
    {
        http_response_code(405); //405 The resource exists, but the request method is not allowed.

        echo json_encode([
            "success" => false,
            "message" => "Method not allowed."
        ]);
        exit;
    }

    $name = trim($_POST["name"] ?? "");

    if ($name === "") 
    {
        http_response_code(400); //400 means Bad Request: the request contains invalid or missing data.

        echo json_encode([
            "success" => false,
            "message" => "Category name is required."
        ]);
        exit;
    }

    $category = $gestion->add($name);

    echo json_encode([
        "success" => true,
        "message" => "Category added successfully.",
        "category" => $category
    ]);

} 
catch (Exception $e) 
{
    http_response_code(400);

    echo json_encode([
        "success" => false,
        "message" => $e->getMessage()
    ]);
}
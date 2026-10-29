<?php
header("Content-Type:application/json");
require_once __DIR__ . "/../backend/gestion.php" ;

try
{
 $modir_dyal_data = new gestion("../data/data.json") ;
 if($_SERVER["REQUEST_METHOD"] === 'GET')
 {
   echo json_encode($modir_dyal_data->get_all());
   exit ;
 }
 else if($_SERVER["REQUEST_METHOD"] === 'POST')
 {
   $name = trim($_POST['name']);
   $data = $modir_dyal_data->add($name) ;
   
   echo json_encode([
      "message" => "that is good",
      "data_junior" => $data
   ]);
 }

}
catch(Exception $e)
{
    
    echo json_encode([
    "message" => $e->getMessage() ,
    "valid??" => "false"
    ]);
}

?>
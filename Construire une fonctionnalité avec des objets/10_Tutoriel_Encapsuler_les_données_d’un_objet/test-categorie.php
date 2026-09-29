<?php
require_once "Categorie.php" ;
$object_1 = new Categories() ;
$object_1->insert_name("ahmed12");
$object_1->insert_color("Black") ;

echo "name " . $object_1->bb . "<br><br>";
//echo "name " . $object_1->name . "<br><br>"; //-> this will never show any thing because it is privet it its class 
echo "name is " . $object_1->passt_name() . "<br>" . "the color is " . $object_1->passt_color();


?>
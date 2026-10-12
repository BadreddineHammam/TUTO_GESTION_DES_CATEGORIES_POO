<?php
require_once "categories.php" ;
$object = new Categorie() ;
$object->set_name("Ahmed") ;
$object->set_color("blue") ;

echo "the name is " . $object->get_name() . "<br><br>" . "the color is " . $object->get_color() ;
?>
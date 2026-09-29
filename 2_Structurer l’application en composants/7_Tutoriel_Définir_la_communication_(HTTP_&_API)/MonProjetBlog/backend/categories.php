<?php
header('Content-type: application/json');

$data = [
 [
    "id" => 1 ,
    "name" => "ahmed"
 ] ,
 [
    "id" => 2 ,
    "name" => "khalid"
 ]
] ;

echo json_encode($data);

?>
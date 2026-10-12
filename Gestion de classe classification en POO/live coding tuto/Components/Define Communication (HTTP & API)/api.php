<?php
header('Content-Type: application/json');
$data = [
[
 'id' => 1 ,
 'name' => 'ahmed',
 'sport' => 'tennis'
],
[
    'id' => 2 ,
    'name' => 'khalid',
    'sport' => 'football'
],
[
    'id' => 3 ,
    'name' => 'sara',
    'sport' => 'pingpon'
]
];
echo json_encode($data) ;
?>
<?php
header('Content-Type: application/json');
$data = [
[
 'id' => 1 ,
 'name' => 'ahmed' ,
 'sport' => 'tennis'
],
[
    'id' => 2 ,
    'name' => 'rachid' ,
    'sport' => 'football'
],
[
    'id' => 3 ,
    'name' => 'khalid' ,
    'sport' => 'pingpon'
]
];

if($_SERVER["REQUEST_METHOD"] === 'GET')
{
 echo json_encode([
    'data' => $data ,
    'massage' => 'tam be naja7'
 ]);
}
else
{
    echo json_encode([
        'massage' => 'error'
     ]);
}
?>
<?php
header('Content-Type: application/json');

$file_name = __DIR__ . '/data.json' ;
$all_data = file_exists($file_name) ? json_decode(file_get_contents($file_name),true) : [] ;
$receive_data = json_decode(file_get_contents('php://input'),true);





if ($_SERVER['REQUEST_METHOD'] === 'GET') 
{

    echo json_encode([
        'success' => true,
        'data' => $all_data
    ]);


} 
else if($_SERVER['REQUEST_METHOD'] === 'POST' )
{
    $receive_data['id'] = time() ;
    $all_data[] = $receive_data ;
    file_put_contents($file_name , json_encode($all_data , JSON_PRETTY_PRINT)); //sent file 

    echo json_encode([
      'succses' => true ,
      'category' => 'get_well' ,
      'data' => $receive_data
    ]);
}
else
{
    echo json_encode([
    'success' => false ,
    'message' => 'goes not well' 
    ]);
}



?>
<?php
header("Content-Type: application/json");
$file = "../backend/file.json";
$all_data = file_exists($file) ? json_decode(file_get_contents($file),true) : [] ;
$data_received_from_input = json_decode(file_get_contents("php://input"),true);
if($_SERVER["REQUEST_METHOD"] == 'GET')
{
  echo json_encode([
   "message" => "true" ,
   "data" => $all_data
  ]);
}
else if($_SERVER["REQUEST_METHOD"] == 'POST')
{
    $all_data[] = $data_received_from_input ;
    file_put_contents($file,json_encode($all_data,JSON_PRETTY_PRINT));
    echo json_encode([
        "message" => "true" ,
        "data" => $all_data
       ]);
}
else
{
    echo json_encode([
        "message" => "false" 
       ]);
}
?>
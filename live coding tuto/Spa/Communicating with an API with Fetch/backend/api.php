<?php
 header('Content-Type: application/json');
 $file_dyalna = "../backend/file.json";
 $all_data = file_exists($file_dyalna) ? json_decode(file_get_contents($file_dyalna),true) : [] ; 
 

 $data_came_from_js = json_decode(file_get_contents("php://input"),true);

 if($_SERVER['REQUEST_METHOD'] === 'GET')
 {
  echo json_encode([
    "message" => "true" ,
    "data" =>  $all_data
  ]);
 }
 else if($_SERVER['REQUEST_METHOD'] === 'POST')
 {
   $all_data[] = $data_came_from_js ;
   file_put_contents($file_dyalna,json_encode($all_data, JSON_PRETTY_PRINT));
   echo json_encode([
    "massage" => "true",
    "data" => $all_data
   ]);
 }
 else if($_SERVER['REQUEST_METHOD'] === 'PUT')
 {
   $data_received_from_PUT = json_decode(file_get_contents("php://input"),true);
   foreach($all_data as $index => $array)
   {
     if($data_received_from_PUT["id"] == $array["id"])
     {
        $all_data[$index]["name"] = $data_received_from_PUT["name"];
        $all_data[$index]["age"] = $data_received_from_PUT["age"];
     }
   }
   file_put_contents($file_dyalna,json_encode($all_data,JSON_PRETTY_PRINT));
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
<?php

require ('api.php');

session_start(); 

sleep(0);

header('Content-Type: application/json');

$data = json_decode(file_get_contents('php://input'), true);

if(isset($data['q'])){
    
        $query = $data['q'];
        
    } else {
        
        die(json_encode(array(
            'status'=>500,
           'message'=>"Request type not defined",
            'data'=>$data
        )));
        
   }

   $q = $data['q'];

switch ($q){

    case "composeMemo":
    
        $response = composeMemo($data);

        echo $response;

    break;

    default:

        die(json_encode(array('status'=>'error', 'message'=>'error processing request')));

    break;

}


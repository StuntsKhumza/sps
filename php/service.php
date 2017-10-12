<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token');
header('Content-Type: application/json');

$local = true;

require ('api.php');

session_start(); 

sleep(0);

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
    
    if (!$local){
        $response = composeMemo($data);
    } else {
        $response = json_encode(array('status'=>200, 'message'=>'Email Sent'));
    }       

        echo $response;

    break;

    default:

        die(json_encode(array('status'=>'error', 'message'=>'error processing request')));

    break;

}


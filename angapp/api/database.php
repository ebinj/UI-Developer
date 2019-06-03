<?php

session_start();

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");



$user = 'admin';

if($user == 'admin') {
    echo '{
        "message": "This is a secret message only for administrator",
        "success": true   
    }';
} else {
    echo '{
        "message": "Who the f are you",
        "success": false
    }';
}

?>

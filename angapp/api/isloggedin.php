<?php

session_start();
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
if(isset($_SESSION['user'])) {
    echo '{"status": true}';
} else {
    echo '{"status": false}';
}
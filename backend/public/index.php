<?php

    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Acces-Control-Allow-Headers: Acces-Control-Allow-Methods,Content-Type,Acces-Control-Allow-Headers,Authorization,X-Requested-With');
    header('Acces-Control-Allow-Methods: GET, PUT, PATCH, POST, DELETE');

    include_once '../app/loader.php';
    
    $ROOT = new core();
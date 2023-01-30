<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';

include_once './config/Database.php';
include_once './controller/Controller.php';

header('Content-Type: application/json');

$database = new Database();
$controller = new Controller($database, 'Persons');

$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        
        break;
    case 'POST':
        echo 'POST';
        break;
    case 'PUT':
        echo 'PUT';
        break;
    case 'DESTROY':
        echo 'DESTROY';
        break;
}


//$database = new Database();
//$db = $database->getConnection();
//$persons = $db->query("SELECT * FROM Persons");
//$res = $persons->fetchAll(PDO::FETCH_ASSOC);

//echo json_encode(
//    [
//        'request_methon' => $_SERVER['REQUEST_METHOD'],
//        'success' => http_response_code(),
//        'response' => $res,
//    ]
//);
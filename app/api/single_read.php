<?php

include_once '../config/Database.php';
include_once '../controller/Controller.php';

header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json');

$database = new Database();
$controller = new Controller($database, 'Persons');

$personId = isset($_GET['id']) ? $_GET['id'] : die();

$res = $controller->getSingleRecord($personId);

if ($res > 0) {
    echo json_encode(
        [
            'request_methon' => $_SERVER['REQUEST_METHOD'],
            'success' => http_response_code(),
            'response' => $res,
        ]
    );
} else {
    echo json_encode([
        'request_methon' => 'error',
        'success' => http_response_code(),
        'response' => 'No data founds',
    ]);
}
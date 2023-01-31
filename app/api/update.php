<?php

include_once '../config/Database.php';
include_once '../controller/Controller.php';

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$database = new Database();
$record = new Controller($database, "Persons");

$data = json_decode(file_get_contents("php://input"));

$record->personId = $data->personId;
$record->lastName = $data->lastName;
$record->firstName = $data->firstName;
$record->address = $data->addresss;
$record->city = $data->city;

if ($record->updateRecord()) {
    echo json_encode(
        [
            'request_methon' => 'Record updated successfully',
            'success' => http_response_code(),
        ]
    );
} else {
    echo json_encode([
        'request_methon' => 'error',
        'success' => http_response_code(),
        'response' => 'Error',
    ]);
}
<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';

include_once './config/Database.php';

header('Content-Type: application/json');

$database = new Database();
$db = $database->getConnection();
$persons = $db->query("SELECT * FROM Persons");
$res = $persons->fetchAll(PDO::FETCH_ASSOC);

echo json_encode(
    [
        'request_methon' => $_SERVER['REQUEST_METHOD'],
        'success' => http_response_code(),
        'response' => $res,
    ]
);
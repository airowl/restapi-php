<?php

header('Content-Type: application/json');

$host = "mysql";
$dbname = "my-wonderful-website";
$charset = "utf8";
$port = "3306";

try {
    $pdo = new PDO(
        dsn: "mysql:host=$host;dbname=$dbname;charset=$charset;port=$port",
        username: "root",
        password: "super-secret-password",
    );

    $persons = $pdo->query("SELECT * FROM Persons");
    $res = $persons->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode(
        [
            'request_methon' => $_SERVER['REQUEST_METHOD'],
            'success' => http_response_code(),
            'response' => $res,
        ]
    );

} catch (PDOException $e) {
    throw new PDOException(
        message: $e->getMessage(),
        code: (int)$e->getCode()
    );
}
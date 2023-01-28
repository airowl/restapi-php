<?php


class Database
{
    private $host = "mysql";
    private $dbname = "my-wonderful-website";
    private $charset = "utf8";
    private $port = "3306";
    private $username = "root";
    private $pass = "super-secret-password";
    private $conn;

    //public function __construct($host, $dbname, $charset, $port)
    //{
        
    //}

    public function getConnection()
    {
        $this->conn = null;
        try {
            $this->conn = new PDO(
                dsn: "mysql:host=". $this->host . ";dbname=" . $this->dbname . ";charset=" . $this->charset . ";port=" . $this->port,
                username: $this->username,
                password: $this->pass,
            );
        } catch (PDOException $e) {
            throw new PDOException(
                message: $e->getMessage(),
                code: (int)$e->getCode()
            ); 
        }

        return $this->conn;
    }
}







<?php

class Controller
{    
    private $conn;
    private $table;
    private $personId;
    private $lastName;
    private $firstName;
    private $address;
    private $city;

    // connection
    public function __construct($db, $table)
    {
        $this->conn = $db->getConnection();
        $this->table = $table;
    }

    // get all
    public function getAll()
    {
        $sqlQuery = "SELECT * FROM " . $this->table . "";
        $persons = $this->conn->query($sqlQuery);
        $res = $persons->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }
    // create
    public function createUser()
    {
        $sqlQuery = "INSERT INTO
                    ". $this->table ."
                SET
                    PersonID = :personId, 
                    LastName = :lastName, 
                    FirstName = :firstName, 
                    Address = :address, 
                    City = :city";

        $createUser = $this->conn->prepare($sqlQuery);

        //! sanitize come un covertitore da inserire nel DB
        $this->personId = htmlspecialchars(strip_tags($this->personId));
        $this->lastName = htmlspecialchars(strip_tags($this->lastName));
        $this->firstName = htmlspecialchars(strip_tags($this->firstName));
        $this->address = htmlspecialchars(strip_tags($this->address));
        $this->city = htmlspecialchars(strip_tags($this->city));

        // bindname
        $createUser->bindParam(":personId", $this->personId);
    }

    // update

    //delete
}
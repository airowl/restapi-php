<?php

class Controller
{    
    private $conn;
    public $table;
    public $personId;
    public $lastName;
    public $firstName;
    public $address;
    public $city;

    // connection
    public function __construct($db, $table = null)
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

    // get single record
    public function getSingleRecord($id)
    {
        $sqlQuery = "SELECT * FROM " . $this->table . " WHERE PersonID = " . $id . "";
        $person = $this->conn->query($sqlQuery);
        $res = $person->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }

    // create
    public function createRecord()
    {
        $sqlQuery = "INSERT INTO " . $this->table . " SET
                    PersonID = :personId, 
                    LastName = :lastName, 
                    FirstName = :firstName, 
                    Address = :address, 
                    City = :city ";

        $createUser = $this->conn->prepare($sqlQuery);

        //! sanitize come un covertitore da inserire nel DB
        //$this->personId = htmlspecialchars(strip_tags($this->personId));
        //$this->lastName = htmlspecialchars(strip_tags($this->lastName));
        //$this->firstName = htmlspecialchars(strip_tags($this->firstName));
        //$this->address = htmlspecialchars(strip_tags($this->address));
        //$this->city = htmlspecialchars(strip_tags($this->city));

        //! bind data
        $createUser->bindParam(":personId", $this->personId);
        $createUser->bindParam(":lastName", $this->lastName);
        $createUser->bindParam(":firstName", $this->firstName);
        $createUser->bindParam(":address", $this->address);
        $createUser->bindParam(":city", $this->city);

        if ($createUser->execute()) {
            return true;
        }
        return false;
    }

    // update

    //delete
}
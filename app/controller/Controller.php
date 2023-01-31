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
    public function updateRecord()
    {
        $sqlQuery = "UPDATE " . $this->table . " SET
                        PersonID = :personId, 
                        LastName = :lastName, 
                        FirstName = :firstName, 
                        Address = :address, 
                        City = :city 
                        WHERE PersonID = :personId";

        $updateRecord = $this->conn->prepare($sqlQuery);

        //! bind data
        $updateRecord->bindParam(":personId", $this->personId);
        $updateRecord->bindParam(":lastName", $this->lastName);
        $updateRecord->bindParam(":firstName", $this->firstName);
        $updateRecord->bindParam(":address", $this->address);
        $updateRecord->bindParam(":city", $this->city);

        if ($updateRecord->execute()) {
            return true;
        }
        return false;
    }

    //delete
    public function deleteRecord()
    {
        $sqlQuery = "DELETE FROM " . $this->table . " WHERE PersonID = ?";
        $deleteRecord = $this->conn->prepare($sqlQuery);

        $deleteRecord->bindParam(1, $this->personId);

        if ($deleteRecord->execute()) {
            return true;
        }
        return false;
    }
}
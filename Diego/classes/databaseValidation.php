<?php

namespace classes;

class databaseValidation
{
    private $servername = "localhost";
    private $username = "username";
    private $password = "password";
    private $dbName = "schooltest";

    public function connectDB()
    {
        $conn = new \mysqli($this->servername, $this->username, $this->password, $this->dbName);

        if ($conn->connect_error)
        {
            die("Connection failed: " . $conn->connect_error);
        }
        else{
            return True;
        }
    }

    public function insertIntoDB($email, $bsn, $firstName, $lastName, $gender, $tnumber)
    {
        $conn = new \mysqli($this->servername, $this->username, $this->password, $this->dbName);
        $sql = "INSERT INTO user (email, BSN, firstname, lastname, gender, tnumber) VALUES ('$email', '$bsn', '$firstName', '$lastName', '$gender', '$tnumber')";

        if ($conn->query($sql) === TRUE)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}
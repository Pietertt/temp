<?php

namespace classes;

class databaseValidation
{
    private $servername = "localhost";
    private $username = "username";
    private $password = "password";
    private $dbName = "user";

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

    public function insertIntoDB($email, $password, $bsn, $firstName, $lastName, $gender)
    {
        $conn = new \mysqli($this->servername, $this->username, $this->password, $this->dbName);
        $sql = "INSERT INTO user (username, password, email, BSN, firstname, lastname, gender) VALUES ('$email', '$password', '$email', '$bsn', '$firstName', '$lastName', '$gender')";

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
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

    public function insertIntoDB()
    {
        $conn = new \mysqli($this->servername, $this->username, $this->password, $this->dbName);
        $sql = 'INSERT INTO user (BSN, firstname, lastname) VALUES (123456789, "test", "testson")';

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
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

    public function insertIntoDB($email, $password, $bsn, $firstName, $lastName, $gender, $tnumber)
    {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $conn = new \mysqli($this->servername, $this->username, $this->password, $this->dbName);
        $sql = "INSERT INTO user (username, password, email, BSN, firstname, lastname, gender, tnumber) VALUES ('$email', '$hash', '$email', '$bsn', '$firstName', '$lastName', '$gender', '$tnumber')";

        if ($conn->query($sql) === TRUE)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function checkEmail($email)
    {
        $conn = new \mysqli($this->servername, $this->username, $this->password, $this->dbName);
        $sql = "SELECT `email` FROM `user` WHERE `email`='$email'";

        if ($conn->query($sql)->num_rows === 0)
        {
            return true;
        }
        else{
            return false;
        }
    }
}
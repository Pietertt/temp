<?php

class testDatabase extends \PHPUnit_Framework_TestCase
{
    public function testConnectDatabase()
    {
        require_once __DIR__ . "/../classes/databaseValidation.php";
        $user = new classes\databaseValidation;

        $this->assertTrue($user->connectDB());
    }

    public function testInsertIntoDatabase()
    {
        require_once __DIR__ . "/../classes/databaseValidation.php";
        $user = new classes\databaseValidation;

        $this->assertTrue($user->insertIntoDB());
    }
}
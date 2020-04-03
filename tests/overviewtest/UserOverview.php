<?php

class useroverview extends \PHPUnit_Framework_TestCase
{
    public function testGetFirstName()
    {
        require_once __DIR__ . "/../classes/Person.php";
        $user = new classes\Person;

        $this->assertTrue($user->getFirstName() == "Julian");
    }

    public function testGetLastName()
    {
        require_once __DIR__ . "/../classes/Person.php";
        $user = new classes\Person();

        $this->assertTrue($user ->getLastName() == "Hulzebosch");
    }

    public function testGetFullName()
    {
        require_once __DIR__ . "/../classes/Person.php";
        $user = new classes\Person();

        $this->assertTrue($user ->getFullName() == "Julian Hulzebosch");
    }

    public function testGetGender(){
        require_once __DIR__ . "/../classes/Person.php";
        $user = new classes\Person();

        $this->assertTrue($user -> getGender()== "Male");
    }

    public function testGetBornAge(){
        require_once __DIR__ . "/../classes/Person.php";
        $user = new classes\Person();

        $this->assertTrue($user -> getBornAge()== "1997");
    }

    public function testGetTelephone(){
        require_once __DIR__ . "/../classes/Person.php";
        $user = new classes\Person();

        $this->assertTrue($user -> getTelephone()== "06-21173334");
    }

    public function testGetEmail(){
        require_once __DIR__ . "/../classes/Person.php";
        $user = new classes\Person();

        $this->assertTrue($user -> getEmail()== "julian-hulzebosch@live.nl");
    }

}

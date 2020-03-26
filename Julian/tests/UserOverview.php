<?php

class useroverview extends \PHPUnit_Framework_Testcase
{
    public function testGetFirstName()
    {
        require_once __DIR__ . "/../classes/Person.php";
        $user = new classes\Person();

        $user->setFirstName("Julian");

        $this->assertTrue($user ->getFirstName() == "Julian");
    }

    public function testGetLastName()
    {
        require_once __DIR__ . "/../classes/Person.php";
        $user = new classes\Person();

        $user->setLastName("Hulzebosch");

        $this->assertTrue($user ->getLastName() == "Hulzebosch");
    }

    public function testGetFullName()
    {
        require_once __DIR__ . "/../classes/Person.php";
        $user = new classes\Person();

        $user->setFirstName("Julian");
        $user->setLastName("Hulzebosch");

        $this->assertTrue($user ->getFullName() == "Julian Hulzebosch");
    }

}

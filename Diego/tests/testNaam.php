<?php

class testNaam extends \PHPUnit_Framework_TestCase
{
    public function testGetFirstName()
    {
        require_once __DIR__ . "/../classes/User.php";
        $user = new classes\User;

        $user->setFirstName("Diego");

        $this->assertTrue($user ->getFirstName() == "Diego");
    }

    public function testGetLastName()
    {
        require_once __DIR__ . "/../classes/User.php";
        $user = new classes\User;

        $user->setLastName("Bencherif");

        $this->assertTrue($user ->getLastName() == "Bencherif");
    }

    public function testGetFullName()
    {
        require_once __DIR__ . "/../classes/User.php";
        $user = new classes\User;

        $user->setFirstName("Diego");
        $user->setLastName("Bencherif");

        $this->assertTrue($user ->getFullName() == "Diego Bencherif");
    }

    public function testIfTrimmed()
    {
        require_once __DIR__ . "/../classes/User.php";
        $user = new classes\User;

        $user->setFirstName("  Diego     ");
        $user->setLastName("  Bencherif   ");

        $this->assertTrue($user ->getFirstName() == "Diego");
        $this->assertTrue($user ->getLastName() == "Bencherif");
    }

    public function testIfOnlyLettersFirstName()
    {
        require_once __DIR__ . "/../classes/User.php";
        $user = new classes\User;

        $this->assertFalse($user->checkOnlyLettersFirstName("di3go"));

        $user->checkOnlyLettersFirstName("Diego");
        $this->assertTrue($user->getFirstName() == "Diego");
    }

    public function testIfOnlyLettersLastName()
    {
        require_once __DIR__ . "/../classes/User.php";
        $user = new classes\User;

        $this->assertFalse($user->checkOnlyLettersLastName("di3go"));

        $user->checkOnlyLettersLastName("Diego");
        $this->assertTrue($user->getLastName() == "Diego");
    }

    public function testIfOnlyFirstLetterCapitalized()
    {
        require_once __DIR__ . "/../classes/User.php";
        $user = new classes\User;

        $this->assertFalse($user->checkOnlyLettersFirstName("DiEgO"));
        $this->assertFalse($user->checkOnlyLettersLastName("BeNcHeRiF"));

        $user->checkOnlyLettersFirstName("Diego");
        $this->assertTrue($user->getFirstName() == "Diego");

        $user->checkOnlyLettersLastName("Bencherif");
        $this->assertTrue($user->getLastName() == "Bencherif");
    }
}
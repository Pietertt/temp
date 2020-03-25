<?php

class testWachtwoord extends \PHPUnit_Framework_TestCase
{
    public function testGetSetPassword()
    {
        require_once __DIR__ . "/../classes/wachtwoordValidation.php";
        $user = new classes\wachtwoordValidation;

        $user->setPassword("test1234");

        $this->assertTrue($user->getPassword() == "test1234");
    }

    public function testIfTrimmed()
    {
        require_once __DIR__ . "/../classes/wachtwoordValidation.php";
        $user = new classes\wachtwoordValidation;

        $user->setPassword("   test1234      ");

       $this->assertTrue($user->getPassword() == "test1234");
    }

    public function testIf8OrMore()
    {
        require_once __DIR__ . "/../classes/wachtwoordValidation.php";
        $user = new classes\wachtwoordValidation;

        $this->assertFalse($user->testLength("test"));

        $user->testLength("test1234");
        $this->assertTrue($user->getPassword() == "test1234");
    }

    public function testIfAtleast1Uppercase()
    {
        require_once __DIR__ . "/../classes/wachtwoordValidation.php";
        $user = new classes\wachtwoordValidation;

        $this->assertFalse($user->testUppercase("test1234"));

        $user->testUppercase("Test1234");
        $this->assertTrue($user->getPassword() == "Test1234");
    }

    public function testIfAtleast1Lowercase()
    {
        require_once __DIR__ . "/../classes/wachtwoordValidation.php";
        $user = new classes\wachtwoordValidation;

        $this->assertFalse($user->testLowercase("TEST1234"));

        $user->testLowercase("Test1234");
        $this->assertTrue($user->getPassword() == "Test1234");
    }

    public function testIfAtleast1Number()
    {
        require_once __DIR__ . "/../classes/wachtwoordValidation.php";
        $user = new classes\wachtwoordValidation;

        $this->assertFalse($user->testNumber("TESTtest"));

        $user->testNumber("Test1234");
        $this->assertTrue($user->getPassword() == "Test1234");
    }

    public function testIfAtleast1SpecialCharacter()
    {
        require_once __DIR__ . "/../classes/wachtwoordValidation.php";
        $user = new classes\wachtwoordValidation;

        $this->assertFalse($user->testSpecialCharacter("Test1234"));

        $user->testNumber("Test123!");
        $this->assertTrue($user->getPassword() == "Test123!");
    }
}
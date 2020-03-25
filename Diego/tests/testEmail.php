<?php

class testEmail extends \PHPUnit_Framework_TestCase
{
    public function testGetEmail()
    {
        require_once __DIR__ . "/../classes/emailValidation.php";
        $user = new classes\emailValidation;

        $user->setEmail("bencherifdiego@gmail.com");

        $this->assertTrue($user->getEmail() == "bencherifdiego@gmail.com");
    }

    public function testIfTrimmed()
    {
        require_once __DIR__ . "/../classes/emailValidation.php";
        $user = new classes\emailValidation;

        $user->setEmail("    bencherifdiego@gmail.com      ");

        $this->assertTrue($user->getEmail() == "bencherifdiego@gmail.com");
    }

    public function testIfEmailValid()
    {
        require_once __DIR__ . "/../classes/emailValidation.php";
        $user = new classes\emailValidation;

        $this->assertFalse($user->validateEmail("test/gmail.com"));
        $this->assertTrue($user->validateEmail("test.test@gmail.com"));
    }
}
<?php

class testTelefoon extends \PHPUnit_Framework_TestCase
{
    public function testGetSetTelefoon()
    {
        require_once __DIR__ . "/../classes/telefoonValidation.php";
        $user = new classes\telefoonValidation;

        $user->setPhone("0123456789");

        $this->assertTrue($user->getPhone() == "0123456789");
    }

    public function testIfTrimmedTelefoon()
    {
        require_once __DIR__ . "/../classes/telefoonValidation.php";
        $user = new classes\telefoonValidation;

        $user->setPhone("         0123456789   ");

        $this->assertTrue($user->getPhone() == "0123456789");
    }

    public function testIfOnlyNumbers()
    {
        require_once __DIR__ . "/../classes/telefoonValidation.php";
        $user = new classes\telefoonValidation;

        $this->assertFalse($user->checkOnlyNumbers("012e456789"));

        $user->checkOnlyNumbers("0123456789");

        $this->assertTrue($user->getPhone() == "0123456789");
    }
}
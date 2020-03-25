<?php

class testGeslacht extends \PHPUnit_Framework_TestCase
{
    public function testGetSex()
    {
        require_once __DIR__ . "/../classes/User.php";
        $user = new classes\User;

        $user->setSex("Man");

        $this->assertTrue($user->getSex() == "Man");
    }

    public function testIfTrimmed()
    {
        require_once __DIR__ . "/../classes/User.php";
        $user = new classes\User;

        $user->setSex("  Man   ");

        $this->assertTrue($user->getSex() == "Man");
    }

    public function testIfOnlyLettersSex()
    {
        require_once __DIR__ . "/../classes/User.php";
        $user = new classes\User;

        $this->assertFalse($user->checkOnlyLettersSex("Ma8"));

        $user->checkOnlyLettersSex("Man");
        $this->assertTrue($user->getSex() == "Man");
    }

    public function testIfOnlyFirstLetterCapitalized()
    {
        require_once __DIR__ . "/../classes/User.php";
        $user = new classes\User;

        $this->assertFalse($user->checkOnlyLettersSex("MaN"));

        $user->checkOnlyLettersSex("Man");
        $this->assertTrue($user->getSex() == "Man");
    }
}
<?php

class test_HypotheekOverview extends \PHPUnit_Framework_Testcase
{
    public function test_GetApplicationDate()
    {
            require_once __DIR__ . "/../classes/Hypotheek.php";
            $user = new classes\Hypotheek();

            $this->assertTrue($user ->getApplication_date() == "02-02-2020");
    }

    public function test_GetMessage()
    {
        require_once __DIR__ . "/../classes/Hypotheek.php";
        $user = new classes\Hypotheek();

        $this->assertTrue($user ->getMessage() == "testing");
    }


}
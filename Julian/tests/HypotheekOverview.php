<?php

class HypotheekOverview extends \PHPUnit_Framework_Testcase
{
    public function testGetApplicationDate()
    {
            require_once __DIR__ . "/../classes/Hypotheek.php";
            $user = new classes\Hypotheek();

            $user->getApplication_date("02-02-2020");

            $this->assertTrue($user ->Application_date() == "02-02-2020");
    }

}
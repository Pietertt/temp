<?php

include_once('contactvalidations.php');

use PHPUnit\Framework\TestCase;

class contactvalidation_Test extends TestCase
{
    private $validation;

    protected function setUp(): void
    {
        $this->validation = new validation();
    }

    public function test_filter_length()
    {
        $this->assertTrue($this->validation->filter_length("Testpassword"), true);
    }

    public function test_filter_characters()
    {
        $this->assertTrue($this->validation->filter_characters("Alleenmaartgeldigekarakters.-_"), true);
    }

    public function test_validate_email()
    {
        $this->assertTrue($this->validation->validate_email("test@test.com"), 1);
    }

    public function test_validation()
    {
        $this->assertTrue($this->validation->validate_user("thomas@ziggo.nl", "293829382"), true);
    }

    protected function tearDown(): void
    {
        $this->validation = NULL;
    }
}

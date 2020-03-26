<?php
      include_once('validate.php');

      use PHPUnit\Framework\TestCase;

      class validation_test extends TestCase {
            private $validation;

            protected function setUp() : void {
                  $this->validation = new validation();
            }

            public function test_filter_length(){
                  $this->assertTrue($this->validation->filter_length("test123"), true);
            }

            public function test_filter_characters(){
                  $this->assertTrue($this->validation->filter_characters("EenHeleHoop.Karakters_-"), true);
            }

            public function test_filter_alphanumeric(){
                  $this->assertTrue($this->validation->filter_alphanumeric("1234567891011"), true);
            }

            public function test_validate_email(){
                  $this->assertTrue($this->validation->validate_email("pietertje@gmail.com"), 1);
            }

            public function test_validate_user(){
                  $this->assertTrue($this->validation->validate_user("thomas@ziggo.nl", "293829382"), true);
            }

            public function test_fail_username_validate_user(){
                  $this->assertFalse($this->validation->validate_user("invalid@username.nl", "293829382"), false);
            }

            public function test_fail_password_validate_user(){
                  $this->assertFalse($this->validation->validate_user("thomas@ziggo.nl", "wrongpassword"), false);
            }

            public function test_fail_validate_user(){
                  

                  $this->assertFalse($this->validation->validate_user("invalid@username.nl", "wrongpassword"), false);
            }

            protected function tearDown() : void {
                  $this->validation = NULL;
            }
      }
?>
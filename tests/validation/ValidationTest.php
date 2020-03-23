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

            public function test_validate_email(){
                  $this->assertTrue($this->validation->validate_email("pietertje@gmail.com"), 1);
            }

            public function test_validation(){
                  $this->assertTrue($this->validation->validate_user("thomas@ziggo.nl", "293829382"), true);
            }

            protected function tearDown() : void {
                  $this->validation = NULL;
            }
      }
?>
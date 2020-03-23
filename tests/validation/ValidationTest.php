<?php
      include_once('validate.php');

      use PHPUnit\Framework\TestCase;

      class validation_test extends TestCase {
            private $validation;

            protected function setUp() : void {
                  $this->validation = new validation("thomas@ziggo.nl", "293829382");
            }

            public function test_filter_length(){
                  $this->assertTrue($this->validation->filter_length($this->validation->password), true);
            }

            public function test_filter_characters(){
                  $this->assertTrue($this->validation->filter_characters($this->validation->password), true);
            }

            public function test_validate_email(){
                  $this->assertTrue($this->validation->validate_email($this->validation->email), 1);
            }

            public function test_validation(){
                  $this->assertTrue($this->validation->validate(), true);
            }

            protected function tearDown() : void {
                  $this->validation = NULL;
            }
      }
?>
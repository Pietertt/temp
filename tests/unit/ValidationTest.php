<?php
      require '/Applications/XAMPP/xamppfiles/htdocs/temp/Pieter/validate.php';

      use PHPUnit\Framework\TestCase;

      class validation_test extends TestCase {
            private $validation;

            protected function setUp() : void {
                   $this->validation = new validation("pieter_boersma-1@telfort.nl", "Test123._-");
            }

            public function test_filter_length(){
                  $this->assertTrue($this->validation->filter_length($this->validation->password), true);
            }

            public function test_filter_characters(){
                  $this->assertTrue($this->validation->filter_characters($this->validation->password), true);
            }

            public function test_validate_email(){
                  $this->assertTrue($this->validation->validate_email($this->validation->email), true);
            }

            protected function tearDown() : void {
                  $this->validation = NULL;
            }
      }
?>
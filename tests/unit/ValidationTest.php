<?php
      require '/Applications/XAMPP/xamppfiles/htdocs/temp/Pieter/validate.php';

      use PHPUnit\Framework\TestCase;

      class validation_test extends TestCase {
            private $validation;

            protected function setUp() : void {
                   $this->validation = new validation("pieterboersma@telfort.nl", "test123");
            }

            public function test_filter_length(){
                  $this->assertTrue($this->validation->filter_length($this->validation->email), true);
            }

            public function test_filter_characters(){
                  $this->assertTrue($this->validation->filter_characters($this->validation->password), true);
            }

            protected function tearDown() : void {
                  $this->validation = NULL;
            }
      }
?>
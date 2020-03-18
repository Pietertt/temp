<?php
      require '/Applications/XAMPP/xamppfiles/htdocs/temp/Pieter/validate.php';

      use PHPUnit\Framework\TestCase;

      class validation_test extends TestCase {
            private $validation;

            protected function setUp() : void {
                   $this->validation = new validation("pieter-boersma@telfort.nl", "test123");
            }

            public function testLength(){
                  $this->assertTrue($this->validation->filter_length($this->validation->email), true);
            }

            protected function tearDown() : void {
                  $this->validation = NULL;
            }
      }
?>
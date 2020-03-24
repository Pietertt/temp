<?php
      include_once('validation.php');

      use PHPUnit\Framework\TestCase;

      class cookie_validation_test extends TestCase {
            private $validation;

            protected function setUp() : void {
                  $this->validation = new validation();
            }

            public function test_does_cookie_exists(){
                  $this->assertTrue($this->validation->does_cookie_exists(), true);
            }

            protected function tearDown() : void {
                  $this->validation = NULL;
            }
      }
?>
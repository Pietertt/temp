<?php
      include_once('cookie.php');

      use PHPUnit\Framework\TestCase;

      class cookie_test extends TestCase {
            private $cookie_setter;

            protected function setUp() : void {
                  $this->cookie_setter = new Cookie("test", "test", time(), "/");
            }

            public function test_cookie_set(){
                  $this->assertTrue($this->cookie_setter->check_expiration_date(), true);
            }

            protected function tearDown() : void {
                  $this->cookie = NULL;
            }
      }
?>
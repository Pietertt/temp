<?php
      include_once('cookie.php');

      use PHPUnit\Framework\TestCase;

      class cookie_test extends TestCase {
            private $cookie_setter;

            protected function setUp() : void {
                  $this->cookie_setter = new CookieSetter("test", "test", time() + 3600, "/");
            }

            public function test_cookie_set(){
                  $this->assertTrue($this->cookie_setter->set(), true);
            }

            protected function tearDown() : void {
                  $this->cookie = NULL;
            }
      }
?>
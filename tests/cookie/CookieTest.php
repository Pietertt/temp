<?php
      include_once('cookie.php');
      include_once('token.php');

      use PHPUnit\Framework\TestCase;

      class cookie_test extends TestCase {
            private $cookie;

            protected function setUp() : void {
                  $this->cookie = new Cookie("test");
                  $this->cookie->create(Token::encode("test@test.nl", "password", time() + 3600, 0));
            }

            public function test_test(){
                  $this->assertTrue($this->cookie->test(), true);
            }

            // /**
            // * @runInSeparateProcess
            // */
            // public function test_check_expiration_date(){
            //       $this->assertTrue($this->cookie->check_expiration_date($this->cookie->get_value()), true);
            // }

            protected function tearDown() : void {
                  $this->cookie->delete();
            }
      }
?>
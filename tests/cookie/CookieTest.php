<?php
      include_once('cookie.php');
      include_once('token.php');

      use PHPUnit\Framework\TestCase;

      class cookie_test extends TestCase {
            private $cookie;
            private $token;

            protected function setUp() : void {
                  $this->cookie = new Cookie("test");
            }

            public function test_check_expiration_date(){
                  $cookie = $this->createMock(Cookie::class);
                  $token = Token::encode("test", "test", time() - 250, 0);

                  $timestamp = Token::decode($token)['timestamp'];
                  $this->assertTrue($this->cookie->check_expiration_date($timestamp), true);
            }

            protected function tearDown() : void {

            }
      }
?>
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
                  $token = $this->createMock(Token::class);

                  $cookie->method('get_value')->willReturn('eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1c2VybmFtZSI6InRlc3RAdGVzdC5ubCIsInBhc3N3b3JkIjoicGFzc3dvcmQiLCJ0aW1lc3RhbXAiOjE1ODUyMzYwMDEsInZlcmlmaWVkIjowfQ.D4A-E82fRI5gkCZc7trC0sKjDkOUwild_di4y7o5YcM');
                  $token->method('decode')->willReturn(array("username" => "test@test.nl", "password" => "password", "timestamp" => "1585235961", "verified" => 0));

                  $timestamp = Token::decode($cookie->get_value())['timestamp'];
                  $this->assertTrue($this->cookie->check_expiration_date($timestamp), true);
            }

            protected function tearDown() : void {

            }
      }
?>
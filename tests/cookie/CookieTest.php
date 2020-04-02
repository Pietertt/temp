<?php
      include_once('cookie.php');
      include_once('tok.php');

      use PHPUnit\Framework\TestCase;

      class cookie_test extends TestCase {
            private $cookie;
            private $tok;

            protected function setUp() : void {
                  $this->cookie = new Cookie("test");
            }

            // checks whether the expiration date is valid
            public function test_check_expiration_date_invalid(){
                  // creates a test Tok object
                  $tok = new Tok();
                  $tok->username = "Pieter";
                  $tok->password = "test";
                  $tok->timestamp = 1585752210;
                  $tok->verified = 0;

                  // mocks the decode method from the token class so it will not interfere
                  $token = $this->createMock(Token::class);
                  $token->method('decode')->willReturn($tok);

                  // the timestamp is way back, so the method will return false
                  $this->assertFalse($this->cookie->check_expiration_date("eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.dxNXorCKwXKxXjffLdNDJtAZfjNk5Gyd+viA/UaGyHXl/nY2k+wnK3R8hdAzy5tUj7VxlYfhvvGctN9uA+aUF7Ujgzqr6XOZdKSttpCl4T+z22aGtilcO28oD7DlCX9EcvnkEp9KUAta4MZpXIAWAeQ0PcjTt1upNN1XYdcuLsaZFokoTu469XqQnxojA809.P57Y6G4Z467QklhCoogrrvqAXvHO3K-4KVlcUspPJHU"), false);
            }

            public function test_verify_true(){
                  $tok = new Tok();
                  $tok->username = "Pieter";
                  $tok->password = "test";
                  $tok->timestamp = 1585752210;
                  $tok->verified = 0;

                  // mocks the decode method from the token class so it will not interfere
                  $token = $this->createMock(Token::class);
                  $token->method('decode')->willReturn($tok);

                  // mocks the cookie class because a cookie cannot be created in a test
                  $cookie = $this->createMock(Cookie::class);
                  $cookie->method('get_value')->willReturn("eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.dxNXorCKwXKxXjffLdNDJtAZfjNk5Gyd+viA/UaGyHXl/nY2k+wnK3R8hdAzy5tUj7VxlYfhvvGctN9uA+aUF7Ujgzqr6XOZdKSttpCl4T+z22aGtilcO28oD7DlCX9EcvnkEp9KUAta4MZpXIAWAeQ0PcjTt1upNN1XYdcuLsaZFokoTu469XqQnxojA809.P57Y6G4Z467QklhCoogrrvqAXvHO3K-4KVlcUspPJHU");

                  $this->assertTrue($this->cookie->verify($cookie->get_value()), true);
            }

            // testing if the cookie does exist. Of course this returns false
            public function test_does_cookie_exist(){
                  $this->assertFalse($this->cookie->does_cookie_exist(), false);
            }

            protected function tearDown() : void {
                  $this->cookie = NULL;
            }
      }
?>
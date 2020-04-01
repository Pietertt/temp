<?php
      include_once('cookie.php');
      include_once('tok.php');

      use PHPUnit\Framework\TestCase;

      class cookie_test extends TestCase {
            private $cookie;
            private $tok;

            protected function setUp() : void {
                  $this->cookie = new Cookie("test");

                  // creates a test Tok object
                  $tok = new Tok();
                  $tok->username = "Pieter";
                  $tok->password = "test";
                  $tok->timestamp = 1585752210;
                  $tok->verified = 0;

                  // mocks the decode method from the token class so it will not interfere
                  $token = $this->createMock(Token::class);
                  $token->method('decode')->willReturn($tok);
            }

            // checks whether the expiration date is valid
            public function test_check_expiration_date_invalid(){
                  $this->assertTrue($this->cookie->check_expiration_date("eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1c2VybmFtZSI6IlBpZXRlciIsInBhc3N3b3JkIjoidGVzdCIsInRpbWVzdGFtcCI6MTU4NTc1MjIxMCwidmVyaWZpZWQiOjB9.F1s3rwjJUbXeLvBYizCrsW5aWtUH5kh7vGO4bZ2XENQ"), false);
            }

            protected function tearDown() : void {

            }
      }
?>
<?php
      include_once('token.php');
      include_once('tok.php');

      use PHPUnit\Framework\TestCase;

      class token_test extends TestCase {

            protected function setUp() : void {

            }
           
            public function test_encode(){
                  $token = Token::encode("Pieter", "test", 1585749601, 0);
                  $this->assertSame($token, "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1c2VybmFtZSI6IlBpZXRlciIsInBhc3N3b3JkIjoidGVzdCIsInRpbWVzdGFtcCI6MTU4NTc0OTYwMSwidmVyaWZpZWQiOjB9.OCzXNwAkOEtL0OZ5V6_Ncp2hcZ3glLDjDlvZsUWa_i4");
                  return $token;
            }

            /**
            * @depends test_encode
            */
            public function test_decode($token){
                  $t = Token::decode($token);
                  $tok = new Tok();
                  $tok->username = "Pieter";
                  $tok->password = "test";
                  $tok->timestamp = 1585749601;
                  $tok->verified = 0;
                  $this->assertEquals($t, $tok);
            }

            protected function tearDown() : void {
                  $this->validation = NULL;
            }
      }
?>
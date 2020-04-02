<?php
      include_once('token.php');
      include_once('tok.php');

      use PHPUnit\Framework\TestCase;

      class token_test extends TestCase {

            protected function setUp() : void {

            }
           
            public function test_encode(){
                  $token = Token::encode("Pieter", 1585749601, 0);
                  $this->assertSame($token, "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.CNR6gFj5M0G+lKw2Pz/p3uzQ8oZWgDRMFgiqstYTkd1b9dDLhEQMpYGznb9PGsSnS0OoZWZr29naYFQ0Gg+m/FPA+Gq4SNKJM6IhDBlgjuTBnoQsZvFt6DpKoCLZM4mBfjTlQuhaipO22RvXIXc/ahJwKzyOXS23P8IaRwK4gI8=._n8Vbw3fX6aVpuFzbSV1cOLhq-z8t6YlkoyNsvBfqW0");
                  return $token;
            }

            /**
            * @depends test_encode
            */
            public function test_decode($token){
                  $t = Token::decode($token);
                  $tok = new Tok();
                  $tok->username = "Pieter";
                  $tok->timestamp = 1585749601;
                  $tok->verified = 0;
                  $this->assertEquals($t, $tok);
                  
                  return $t;
            }

            /**
            * @depends test_decode
            */
            public function test_verify($token){
                  // verifies the token the unverified token
                  Token::verify($token);

                  $this->assertSame($token->verified, 1);
            }

            protected function tearDown() : void {
                  
            }
      }
?>
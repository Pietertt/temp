<?php
      include_once('token.php');
      include_once('tok.php');

      use PHPUnit\Framework\TestCase;

      class token_test extends TestCase {

            protected function setUp() : void {

            }

            // Because is it impossible to test the encode method, this tests combines the decode and encode methods. 
            public function test_decode(){
                  $username = "Pieter";
                  $timestamp = 1585749601;
                  $verified = 0;

                  $token = Token::encode($username, $timestamp, $verified);
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
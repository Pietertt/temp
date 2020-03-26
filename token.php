<?php
      class Token {
            private $username;
            private $password;
            private $time_stamp;
            private $verified;

            private $token;

            public function __construct($username, $password){
                  $this->username = $username;
                  $this->password = $password;
                  $this->time_stamp = time();
                  $this->verified = 0;
                  $this->encode();
            }

            public static function encode($username, $password, $time_stamp, $verified): string {
                  $header = json_encode(['typ' => 'JWT', 'alg' => 'HS256']);
                  $payload = json_encode(['username' => $username, 'password' => $password, 'timestamp' => $time_stamp, 'verified' => $verified]);
                  
                  $base64UrlHeader = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($header));
                  $base64UrlPayload = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($payload));
                  
                  $signature = hash_hmac('sha256', $base64UrlHeader . "." . $base64UrlPayload, 'fkdj54jgj!$&dfj', true);
                  $base64UrlSignature = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($signature));
                  return $base64UrlHeader . "." . $base64UrlPayload . "." . $base64UrlSignature;
            }

            public static function verify($json){
                  $json->verified = 1;
                  return $json;
            }

            public static function decode($token){
                  $encoded = explode('.', $token)[1];
                  $replaced = str_replace(['-', '_', ''], ['+', '/', '='], $encoded);
                  $base64 = base64_decode($replaced);
                  $json = json_decode($base64);

                  return $json;
            }

            public function get_time_stamp($string) : string {

                  return $this->decode($string)->time_stamp;
            }
      }
?>
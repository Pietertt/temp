<?php
      class Token {
            private $username;
            private $password;
            private $token;

            public function __construct(){

            }

            public function encode($username, $password): void {
                  $this->username = $username;
                  $this->password = $password;
                  $header = json_encode(['typ' => 'JWT', 'alg' => 'HS256']);
                  $payload = json_encode(['username' => $this->username, 'password' => $this->password, 'timestamp' => time()]);
                  
                  $base64UrlHeader = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($header));
                  $base64UrlPayload = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($payload));
                  
                  $signature = hash_hmac('sha256', $base64UrlHeader . "." . $base64UrlPayload, 'fkdj54jgj!$&dfj', true);
                  $base64UrlSignature = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($signature));
                  $this->token = $base64UrlHeader . "." . $base64UrlPayload . "." . $base64UrlSignature;
            }

            public function get_token(): string {
                  return $this->token;
            }

            public function decode() {
                  return (json_decode(base64_decode(str_replace('_', '/', str_replace('-','+',explode('.', $this->token)[0])))));
            }
      }
?>
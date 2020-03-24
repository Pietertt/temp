<?php
      class token {
            private $username;
            private $password;

            public function __construct($username, $password){
                  $this->username = $username;
                  $this->password = $password;
            }

            public function generate(): string {
                  $header = json_encode(['typ' => 'JWT', 'alg' => 'HS256']);
                  $payload = json_encode(['username' => $this->username, 'password' => $this->password, 'timestamp' => date('Ymdhisu')]);
                  
                  $base64UrlHeader = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($header));
                  $base64UrlPayload = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($payload));
                  
                  $signature = hash_hmac('sha256', $base64UrlHeader . "." . $base64UrlPayload, 'fkdj54jgj!$&dfj', true);
                  $base64UrlSignature = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($signature));
                  $jwt = $base64UrlHeader . "." . $base64UrlPayload . "." . $base64UrlSignature;

                  return $jwt;
            }
      }
?>
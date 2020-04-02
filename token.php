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

            public static function encode($username, $time_stamp, $verified): string {
                  $key = "2344df98df76df5dfdf54534534v";

                  $header = json_encode(['typ' => 'JWT', 'alg' => 'HS256']);
                  $payload = json_encode(['username' => $username, 'timestamp' => $time_stamp, 'verified' => $verified]);
                  
                  $base64UrlHeader = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($header));
                  $base64UrlPayload = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($payload));

                  $ivlen = openssl_cipher_iv_length($cipher = "AES-128-CBC");
                  $iv = openssl_random_pseudo_bytes($ivlen);
                  $ciphertext_raw = openssl_encrypt($base64UrlPayload, $cipher, $key, $options = OPENSSL_RAW_DATA, $iv);
                  $hmac = hash_hmac('sha256', $ciphertext_raw, $key, $as_binary = true);
                  $ciphertext = base64_encode($iv . $hmac . $ciphertext_raw);
                  
                  $signature = hash_hmac('sha256', $base64UrlHeader . "." . $base64UrlPayload, 'fkdj54jgj!$&dfj', true);
                  $base64UrlSignature = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($signature));
                  return $base64UrlHeader . "." . $ciphertext . "." . $base64UrlSignature;
            }

            public static function decode($token) : Tok {
                  $key = "2344df98df76df5dfdf54534534v";
                  $encoded = explode('.', $token)[1];
                  
                  $c = base64_decode($encoded);
                  $ivlen = openssl_cipher_iv_length($cipher = "AES-128-CBC");
                  $iv = substr($c, 0, $ivlen);
                  $hmac = substr($c, $ivlen, $sha2len = 32);
                  $ciphertext_raw = substr($c, $ivlen + $sha2len);
                  $original_plaintext = openssl_decrypt($ciphertext_raw, $cipher, $key, $options = OPENSSL_RAW_DATA, $iv);
                  $calcmac = hash_hmac('sha256', $ciphertext_raw, $key, $as_binary = true);

                  if (hash_equals($hmac, $calcmac)){
                        $replaced = str_replace(['-', '_', ''], ['+', '/', '='], $original_plaintext);
                        $base64 = base64_decode($replaced);
                        $json = json_decode($base64);
                        
                        $json = json_decode($base64);

                        $token = new Tok();
                        $token->username = $json->username;
                        $token->timestamp = $json->timestamp;
                        $token->verified = $json->verified;

                        return $token;
                  } else {
                        return new Tok();
                  }
            }

            public static function verify($token) : Tok {
                  $token->verified = 1;
                  return $token;
            }
      }
?>
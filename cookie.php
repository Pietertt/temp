<?php
      class Cookie {
            private $name;
            private $value;

            public function __construct($name){
                  $this->name = $name;
            }

            public function create($value) : void {
                  $this->value = $value;
                  setcookie($this->name, $this->value, time() + 86400, "/");
            }

            public function delete(){
                  setcookie($this->value, "", time() - 3600, "/");
            }

            public function get_value() : string {
                  return $_COOKIE[$this->name];
            }

            public function does_cookie_exist() : bool {
                  if(isset($_COOKIE[$this->name])){
                        return true;
                  } else {
                        return false;
                  }
            }

            public function check_expiration_date($token) {
                  $timestamp = Token::decode($token)->timestamp;
                  if(time() - $timestamp > 30000000000){
                        return false;
                  } else {
                        return true;
                  }                  
            }

            public function verify($token){
                  $decoded = Token::decode($token);
                  if($decoded->verified == 1){
                        return true;
                  } else {
                        return false;
                  }
            }

            public function validate_user($value){
                  if($this->does_cookie_exist()){
                        if($this->check_expiration_date($value)){
                              if($this->verify($value)){
                                    return true;
                              } else {
                                    return false;
                              }
                        } else {
                              return false;
                        }
                  }
            }
      }
?>
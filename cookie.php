<?php
      class Cookie {
            private $name;
            private $value;

            public function __construct($name){
                  $this->name = $name;
            }

            public function create($value) : void {
                  $this->value = $value;
                  //setcookie($this->name, $this->value, time() + 86400, "/");
            }

            public function test(){
                  return true;
            }

            public function delete(){
                  //setcookie($this->value, "", time() - 3600, "/");
            }

            public function get_value() : string {
                  return $_COOKIE[$this->name];
            }

            public function check_expiration_date($token) {
                  if(time() - Token::decode($token)->timestamp > 300){
                        return false;
                  } else {
                        return true;
                  }                  
            }
      }
?>
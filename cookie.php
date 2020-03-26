<?php
      class Cookie {
            private $name;
            private $value;

            public function __construct($name){
                  $this->name = $name;
            }

            public function set($value) : void {
                  $this->value = $value;
                  setcookie($this->name, $this->value, time() + 86400, "/");
            }

            public function get_value() : string {
                  return $_COOKIE[$this->name];
            }

            public function encode(){
                  
            }

            // public function check_expiration_date($timestamp) {
            //       if(time() - $timestamp > 300){
            //             return "false";
            //       } else {
            //             return true;
            //       }                  
            // }
      }
?>
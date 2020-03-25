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

            public function check_expiration_date() {
                  return $_COOKIE[$this->name];
            }

      }
?>
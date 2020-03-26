<?php
      class cookie {
            private $name;
            private $value;

            public function __construct($name){
                  $this->name = $name;
                  $this->value = "";
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

            public function check_expiration_date($timestamp) {
                  if(time() - $timestamp > 300){
                        return false;
                  } else {
                        return true;
                  }                  
            }
      }
?>
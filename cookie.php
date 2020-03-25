<?php
      class Cookie {
            private $name;
            private $value;
            private $time_stamp;
            private $domain;

            public function __construct($name, $value, $time_stamp, $domain){
                  $this->name = $name;
                  $this->value = $value;
                  $this->time_stamp = $time_stamp;
                  $this->domain = $domain;
            }

            public function set() : void {
                  setcookie($this->name, $this->value, $this->time_stamp, $this->domain);
            }

            public function check_expiration_date() : bool {
                  if((time() - $this->time_stamp) < 300){
                        return true;
                  } else {
                        return false;
                  }
            }

      }
?>
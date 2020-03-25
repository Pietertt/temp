<?php
      class CookieSetter {
            private $name;
            private $value;
            private $expire;
            private $domain;

            public function __construct($name, $value, $expire, $domain){
                  $this->name = $name;
                  $this->value = $value;
                  $this->expire = $expire;
                  $this->domain = $domain;
            }

            public function set() : bool {
                  setcookie("test", "test", time() + 3600, "/");
                  if(isset($_COOKIE[$this->name])){
                        return true;
                  } else {
                        return false;
                  }
            }

      }
?>
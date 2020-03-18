<?php

      class validation {
            private $email;
            private $password;

            public function __construct($email, $password){
                  $this->email = $email;
                  $this->password = $password;
            }

            public function sanitize() : bool {
                  return false;
            }

            public function validate() : bool{
                  return true;
            }
      }
?>
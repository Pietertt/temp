<?php

      class validation {
            public $email;
            public $password;

            private $errors = array();

            public function __construct($email, $password){
                  $this->email = $email;
                  $this->password = $password;
            }

            public function filter_length($string) : bool {
                  if(preg_match("'^.{0,50}$'", $string)){
                        return true;
                  } else {
                        array_push($this->errors, "Je invoer moet tussen de 0 en 50 karakter bevatten");
                        return false;
                  }
            }

            public function filter_alphanumeric($string) : bool {
                  if(preg_match("", $string)){
                        return true;
                  } else {
                        array_push($this->errors, "Je invoer mag ");
                  }
            }

            public function filter_characters($string) : bool{
                  $pattern = "'[a-zA-Z0-9|@.-]'";
                  if(preg_match($pattern, $string)){
                        return true;
                  } else {
                        array_push($this->errors, "Je invoer mag alleen maar ");
                        return false;
                  }
            }
      }
?>
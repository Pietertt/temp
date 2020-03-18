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
                  if(strlen($string) > 0){
                        if(strlen($string) < 50){
                              return true;
                        } else {
                              array_push($this->errors, "Je invoer mag niet meer dan 50 karakters bevatten");
                              return false;
                        }
                  } else {
                        array_push($this->errors, "Je moet meer dan 0 karakters invoeren");
                        return false;
                  }
            }

            public function filter_characters() : bool{
                  $banned = ["&"];
            }
      }
?>
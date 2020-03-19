<?php
      require 'database.php';

      class validation {
            public $email;
            public $password;

            private $errors = array();

            public function __construct($email, $password){
                  $this->email = $email;
                  $this->password = $password;
            }

            public function filter_length($string) : bool {
                  $pattern = "'^.{1,50}$'";
                  if(preg_match($pattern, $string)){
                        return true;
                  } else {
                        array_push($this->errors, "Je invoer moet tussen de 0 en 50 karakter bevatten");
                        return false;
                  }
            }

            public function filter_characters($string) : bool{
                  $pattern = "'^[a-zA-Z0-9.|_|-]{1,}$'";
                  if(preg_match($pattern, $string)){
                        return true;
                  } else {
                        array_push($this->errors, "Je invoer mag alleen maar letters, cijfers of de tekens '@', '.', '-', '_' bevatten");
                        return false;
                  }
            }

            public function validate_email($email){
                  if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        return true;
                  } else {
                        return false;
                  }
            }

            public function validate($username, $password){
                  $database = new database("127.0.0.1", "root", "", "ritsemabanck");
                  $database->connect();
                  
            }
      }

      $validation = new validation("d", "d");
      $validation->validate("d", "d");
?>
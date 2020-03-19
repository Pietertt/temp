<?php
      include_once('database.php');

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

            public function filter_characters($string) : bool {
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

            public function validate(){
                  $database = new database("127.0.0.1", "root", "", "ritsemabanck");
                  $database->connect();
                  
                  $stmt = $database->get_connection()->prepare("SELECT email, BSN FROM `user` WHERE ((email = ?) AND (BSN = ?))");
                  $stmt->bind_param("ss", $e, $p);
                  $e = $this->email;
                  $p = $this->password;
                  $stmt->execute();

                  $rows = $stmt->get_result()->num_rows;

                  $database->disconnect();

                  if($rows == 1){
                        return true;
                  } else {
                        return false;
                  }

                  return $rows;
            }
      }

      $validation = new validation("thomas@ziggo.nl", "293829382");
      print_r($validation->validate());
?>
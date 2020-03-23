<?php
      include_once('database.php');

      class validation {

            private $errors = array();

            public function __construct(){
                  
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
                        array_push($this->errors, "Je invoer mag alleen maar letters, cijfers of de tekens .', '-', '_' bevatten");
                        return false;
                  }
            }

            public function validate_email($email){
                  if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        return true;
                  } else {
                        array_push($this->errors, "Het ingevoerde e-mailadres is niet geldig");
                        return false;
                  }
            }

            public function validate_user($email, $password){
                  $database = new database("127.0.0.1", "root", "", "ritsemabanck");
                  $database->connect();
                  
                  $stmt = $database->get_connection()->prepare("SELECT email, BSN FROM `user` WHERE ((email = ?) AND (BSN = ?))");
                  $stmt->bind_param("ss", $e, $p);
                  $e = $email;
                  $p = $password;
                  $stmt->execute();

                  $rows = $stmt->get_result()->num_rows;

                  $database->disconnect();

                  if($rows == 1){
                        return true;
                  } else {
                        array_push($this->errors, "De combinatie tussen je gebruikersnaam en je wachtwoord is niet juist");
                        return false;
                  }

                  return $rows;
            }

            public function validate_code($code){
                  $database = new database("127.0.0.1", "root", "", "ritsemabanck");
                  $database->connect();
                  
                  $stmt = $database->get_connection()->prepare("SELECT tnumber FROM `user` WHERE tnumber = ?");
                  $stmt->bind_param("s", $t);
                  $t = $code;
                  $stmt->execute();

                  $rows = $stmt->get_result()->num_rows;

                  $database->disconnect();

                  if($rows == 1){
                        return true;
                  } else {
                        array_push($this->errors, "De code is niet juist");
                        return false;
                  }
            }

            public function get_errors() : string {
                  return json_encode($this->errors);
            }
      }
?>
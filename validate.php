<?php
      include_once('database.php');

      class validation {

            private $errors = array();

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

            public function filter_alphanumeric($string) : bool {
                  $pattern = "'^[0-9]+$'";
                  if(preg_match($pattern, $string)){
                        return true;
                  } else {
                        array_push($this->errors, "Je invoer mag alleen maar cijfers bevatten");
                        return false;
                  }
            }

            public static function validate_email($email) : bool {
                  if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        return true;
                  } else {
                        array_push($this->errors, "Het ingevoerde e-mailadres is niet geldig");
                        return false;
                  }
            }

            public function validate_user($email, $password) {
                  // $database = new database();
                  // $result = $database->select("SELECT password FROM `user` WHERE email = ?", array($email));
                  // if(!$database->empty($result)){
                  //       password_verify($password, $database->fetch($result)["password"]);
                  //       print($password);
                  //       $result = $database->select("SELECT email, password FROM `user` WHERE ((email = ?) AND (password = ?))", array($email, $password));

                  //       if(!$database->empty($result)){
                  //             return "true";
                  //       } else {
                  //             array_push($this->errors, "De combinatie tussen je gebruikersnaam en je wachtwoord is niet juist");
                  //             return false;
                  //       }
                  // } else {
                  //       array_push($this->errors, "De combinatie tussen je gebruikersnaam en je wachtwoord is niet juist");
                  // }
                  
                  // check whether the email does exists in the database
                  $database = new Database();
                  $result = $database->select("SELECT email FROM `user` WHERE email = ?", array($email));
                  if(!$database->empty($result)){
                        // checks if the query returns a row. Most likely it does, but it is a good practice to check for it 
                        $result = $database->select("SELECT password FROM `user` WHERE email = ?", array($email));
                        if(!$database->empty($result)){
                              $hashed_password = $database->fetch($result)["password"];
                              // $test = password_verify($password, $pwd);
                              if(password_verify($password, $hashed_password)){
                                    print("Fuu");
                              }
                        } else {
                              array_push($this->errors, "De combinatie tussen je gebruikersnaam en je wachtwoord is niet juist");
                        }
                  } else {
                        array_push($this->errors, "De combinatie tussen je gebruikersnaam en je wachtwoord is niet juist");
                  }
            }

            public function validate_code($code) : bool {
                  $database = new database();
                  $database->connect("127.0.0.1", "root", "", "ritsemabanck");
                  
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
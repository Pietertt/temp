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
                  // check whether the email does exists in the database
                  $database = new Database();
                  $result = $database->select("SELECT email FROM `user` WHERE email = ?", array($email));
                  if(!$database->empty($result)){
                        // checks if the query returns a row. Most likely it does, but it is a good practice to check for it 
                        $result = $database->select("SELECT password FROM `user` WHERE email = ?", array($email));
                        if(!$database->empty($result)){
                              // fetches the hash from the database
                              $hash = $database->fetch($result)["password"];
                              // verifies that the password is equal to the decyphered hash
                              if(password_verify("test", $hash)){
                                    return true;
                              } else {
                                    array_push($this->errors, "De combinatie tussen je gebruikersnaam en je wachtwoord is niet juist");
                                    return false;
                              }
                        } else {
                              array_push($this->errors, "De combinatie tussen je gebruikersnaam en je wachtwoord is niet juist");
                              return false;
                        }
                  } else {
                        array_push($this->errors, "De combinatie tussen je gebruikersnaam en je wachtwoord is niet juist");
                        return false;
                  }
            }

            public function validate_code($code) : bool {
                  $database = new database();
                  $rows = $database->select("SELECT tnumber FROM `user` WHERE tnumber = ?", array($code))->num_rows;

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
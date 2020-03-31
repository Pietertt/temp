<?php
      class database {
            private $server;
            private $username;
            private $password;
            private $database;
            private $connection;

            public function __construct(){

            }

            public function connect($server, $username, $password, $database) {
                  $this->server = $server;
                  $this->username = $username;
                  $this->password = $password;
                  $this->database = $database;
                  $this->connection = new mysqli($this->server, $this->username, $this->password, $this->database);
            }

            public function get_connection() {
                  return $this->connection;
            }

            public function select($query, $values) {
                  $cookie = new Cookie("token");
                  if($cookie->validate_user($cookie->get_value())){
                        $stmt = $this->get_connection()->prepare($query);
                  
                        $type = "";

                        for($i = 0; $i < count($values); $i++){
                              $type = $type . substr(gettype($values[$i]), 0, 1);
                        }

                        $args = array(&$type);

                        for ($i=0; $i < count($values); $i++){
                              $args[] = &$values[$i];
                        }

                        call_user_func_array( array($stmt, 'bind_param'), $args);
                        
                        $stmt->execute();
                        $result = $stmt->get_result();
                        return $result->fetch_assoc();
                  } else {
                        return "Je bent niet ingelogd";
                  }     
                  
            }

            public function update($query, $values) : bool {
                  // creates a new instance of the Cookie class
                  $cookie = new Cookie("token");
                  if($cookie->validate_user($cookie->get_value())){ // validates that the token stored in the cookie is verified
                        
                        // prepares the query
                        $stmt = $this->get_connection()->prepare($query);
                        
                        // stores the types of the values to a string
                        $type = "";
                        for($i = 0; $i < count($values); $i++){
                              $type = $type . substr(gettype($values[$i]), 0, 1);
                        }

                        // appends the values to the array
                        $args = array(&$type);
                        for ($i=0; $i < count($values); $i++){
                              $args[] = &$values[$i];
                        }

                        // binds the parameters to the prepared query
                        call_user_func_array( array($stmt, 'bind_param'), $args);
                        
                        // executes the query and returns either true of false
                        if($stmt->execute()){
                              return true;
                        } else {
                              return false;
                        }
                  } else {
                        return false;
                  }
            }

            public function disconnect(){
                  $this->connection->close();
            }
      }
?>
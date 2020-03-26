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

            public function select($query){
                  
            }

            public function disconnect(){
                  $this->connection->close();
            }
      }
?>
<?php
      class database {
            private $server;
            private $username;
            private $password;
            private $database;
            private $connection;

            public function __construct($server, $username, $password, $database){
                  $this->server = $server;
                  $this->username = $username;
                  $this->password = $password;
                  $this->database = $database;
            }

            public function connect(){
                  $this->connection = new mysqli($this->server, $this->username, $this->password, $this->database);
            }
      }
?>
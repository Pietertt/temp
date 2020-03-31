<?php
      require("../../token.php");
      require("../../tok.php");
      require("../../cookie.php");
      require("../../database.php");

      session_start();

      if(isset($_POST["field"]) && isset($_POST["value"])){
            $field = $_POST["field"];
            $value = $_POST["value"];

            $cookie = new Cookie("token");
            $email = Token::decode($cookie->get_value())->username;

            $database = new Database();
            $database->connect("localhost", "root", "", "ritsemabanck");
            print_r($database);

            
      } else {
            print("Please post something");
      }
?>
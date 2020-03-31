<?php
      require("../../token.php");
      require("../../tok.php");
      require("../../cookie.php");
      require("../../database.php");
      require("../../user.php");

      if(isset($_POST["field"]) && isset($_POST["value"])){
            $field = $_POST["field"];
            $value = $_POST["value"];

            $cookie = new Cookie("token");

            if($field == "phone"){
                 User::update_phone_number(Token::decode($cookie->get_value())->username, $value);
            }

            if($field == "email"){
                  User::update_email(Token::decode($cookie->get_value())->username, $value);
             }

            
      } else {
            print("Please post something");
      }
?>
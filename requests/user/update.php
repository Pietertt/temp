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
                  if(User::update_phone_number(Token::decode($cookie->get_value())->username, $value)){
                        print(true);
                  } else {
                        print(false);
                  }
            }

            if($field == "email"){
                  if(User::update_email(Token::decode($cookie->get_value())->username, $value)){
                        print(true);
                  } else {
                        print(false);
                  }
             }

            
      } else {
            print("Please post something");
      }
?>
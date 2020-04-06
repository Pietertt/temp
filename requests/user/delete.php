<?php
      require("../../token.php");
      require("../../tok.php");
      require("../../cookie.php");
      require("../../database.php");
      require("../../user.php");
      require("../../validate.php");

      if(isset($_POST["email"])){
            $email = $_POST["email"];
            $validation = new validation();
            if($validation->filter_length($email)){
                  $database = new Database();
                  $result = $database->delete("DELETE FROM User WHERE email = ?", array($email));
                  if($result == true){
                        print("true");
                  } else {
                        print("false");
                  }
            } else {
                  print(json_encode($validation->get_errors()[0]));
            }
      }
?>
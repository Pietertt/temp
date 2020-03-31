<?php
      require("../../token.php");
      require("../../tok.php");
      require("../../cookie.php");
      require("../../database.php");

      if(isset($_POST["field"]) && isset($_POST["value"])){
            $field = $_POST["field"];
            $value = $_POST["value"];

            
      } else {
            print("Please post something");
      }
?>
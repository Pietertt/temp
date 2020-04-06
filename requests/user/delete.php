<?php
      require("../../token.php");
      require("../../tok.php");
      require("../../cookie.php");
      require("../../database.php");
      require("../../user.php");
      require("../../validation.php");

      if(isset($_POST["email"])){
            $email = $_POST["email"];
            $validation = new validation();
      }
?>
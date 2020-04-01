<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

      require("cookie.php");
      require("token.php");
      require("tok.php");
      require("database.php");
      require("validate.php");

      $v = new Cookie("token");


      print_r(Token::decode("eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1c2VybmFtZSI6IlBpZXRlciIsInBhc3N3b3JkIjoidGVzdCIsInRpbWVzdGFtcCI6MTU4NTc0OTYwMSwidmVyaWZpZWQiOjB9.OCzXNwAkOEtL0OZ5V6_Ncp2hcZ3glLDjDlvZsUWa_i4"));

      //print_r($database->empty($database->select("SELECT * FROM User WHERE email = ?", array("pieter@boersma.nl"))));
      
?>
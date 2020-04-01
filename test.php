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

      $db = new Database();
      $time = time();
      print_r(Token::encode("Pieter", "test", $time, 0));
      print("<br>" . $time);
      //print_r($database->empty($database->select("SELECT * FROM User WHERE email = ?", array("pieter@boersma.nl"))));
      
?>
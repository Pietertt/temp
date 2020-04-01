<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

      require("cookie.php");
      require("token.php");
      require("tok.php");
      require("database.php");
      require("validate.php");

      $v = new validation();
      print_r($v->validate_user("pieter@b.nl", "test"));

      //print_r($database->empty($database->select("SELECT * FROM User WHERE email = ?", array("pieter@boersma.nl"))));
      
?>
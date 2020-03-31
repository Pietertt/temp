<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

      require("cookie.php");
      require("token.php");
      require("tok.php");
      require("database.php");

      $database = new database();
      $database->connect("127.0.0.1", "root", "", "ritsemabanck");

      print_r($database->update("UPDATE User SET partner = ? WHERE email = ?", array(23, "thomas@ziggo.nl")));
      
?>
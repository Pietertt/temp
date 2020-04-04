<?php
      include("cookie.php");
      $cookie = new Cookie("token");
      $cookie->delete();
      session_start();
      session_unset(); 
      session_destroy();
      header("Location: Pieter/index.php");
?>
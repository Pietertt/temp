<?php
      session_start();
      
      include($_SERVER['DOCUMENT_ROOT'] . "/temp/token.php");
      include($_SERVER['DOCUMENT_ROOT'] . "/temp/cookie.php");
      include($_SERVER['DOCUMENT_ROOT'] . "/temp/tok.php");
      include($_SERVER['DOCUMENT_ROOT'] . "/temp/session.php");

      $cookie = new Cookie("token");
      if($cookie->does_cookie_exist()){
            if($cookie->validate_user($_COOKIE["token"])){
                  $_SESSION["logged_in"] = true;
            } else {
                  $_SESSION["logged_in"] = false;
            }
      } 

?>    
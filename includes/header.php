<?php
      session_start();
      
      include("token.php");
      include("cookie.php");
      include("tok.php");

      $cookie = new Cookie("token");
      if($cookie->validate_user($_COOKIE["token"])){

      }
?>    

<!DOCTYPE html>
<html lang="en">
      <head>
            <meta charset="UTF-8">
            <title>Ritsema Banck</title>
            <link rel='icon' href='http://localhost/temp/img/ritsemabanck-favicon.png' type='image/x-icon'/>
            <link type="text/css" rel="stylesheet" href="http://localhost/temp/css/style.css"/>
      </head>
<body>
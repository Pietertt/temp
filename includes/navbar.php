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
      } else {
            $_SESSION["logged_in"] = false;
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
      <div class="row nopad">
            <nav class="twelve wide centered container">
                  <a href="http://localhost/temp/jmh/home.php"><img class="navbar-logo" src="http://localhost/temp/img/Ritsema%20Banck%20logo.png"></a>

                  <div class="navbar-menu-wrapper centered column">
                        <span id="openNav">&#9776;</span>
                  </div>

                  <div id="mobileNav" class="overlay">
                        <a href="javascript:void(0)" class="closebtn" id="closeNav">&times;</a>
                        <div class="overlay-content">
                              <a href="http://localhost/temp/jmh/home.php">HOME</a>
                              <?php echo ($_SESSION["logged_in"] == false) ? '<a href="http://localhost/temp/pieter/index.php">INLOGGEN</a>' : '<a href="http://localhost/temp/dashboard/index.php">DASHBOARD</a>'; ?>
                              <a href="http://localhost/temp/sietze/intranet/index.php">INTRANET</a>
                              <a href="http://localhost/temp/jmh/contact.php">CONTACT</a>
                        </div>
                  </div>

                  <div class="nav-links">
                        <ul>
                            <li><a href="http://localhost/temp/jmh/home.php">HOME</a></li>
                            <li><?php echo ($_SESSION["logged_in"] == false) ? '<a href="http://localhost/temp/pieter/index.php">INLOGGEN</a>' : '<a href="http://localhost/temp/dashboard/index.php">DASHBOARD</a>'; ?></li>
                            <li><a href="http://localhost/temp/sietze/intranet/index.php">INTRANET</a></li>
                            <?php echo ($_SESSION["logged_in"] == true) ? '<li><a href="http://localhost/temp/logout.php">UITLOGGEN</a></li>' : ''; ?>
                            <li><a href="http://localhost/temp/jmh/contact.php">CONTACT</a></li>
                        </ul>
                  </div> 
            </nav>
      </div>


<?php
      session_start();
      
      include($_SERVER['DOCUMENT_ROOT'] . "/token.php");
      include($_SERVER['DOCUMENT_ROOT'] . "/cookie.php");
      include($_SERVER['DOCUMENT_ROOT'] . "/tok.php");
      include($_SERVER['DOCUMENT_ROOT'] . "/session.php");
      include($_SERVER['DOCUMENT_ROOT'] . "/user.php");
      include($_SERVER['DOCUMENT_ROOT'] . "/database.php");

      $cookie = new Cookie("token");
      if($cookie->does_cookie_exist()){
            if($cookie->validate_user($_COOKIE["token"])){
                  $_SESSION["logged_in"] = true;
                  $cookie->update();
                  $database = new Database();
                  $database->connect("localhost", "root", "", "ritsemabanck");
                  $result = $database->fetch($database->select("SELECT * FROM User WHERE email = ?", array(Token::decode($cookie->get_value())->username)));
                  
                  $user = new User();
                  $user->id = $result["id"];
                  $user->firstname = $result["firstname"];
                  $user->lastname = $result["lastname"];
                  $user->gender = $result["gender"];
                  $user->birth_date = $result["birth_date"];
                  $user->residence = $result["residence"];
                  $user->house_number = $result["house_number"];
                  $user->addition = $result["addition"];
                  $user->postal_code = $result["postal_code"];
                  $user->phone_number = $result["tnumber"];
                  $user->email = $result["email"];

                  $_SESSION["user"] = $user;
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
            <link rel='icon' href='/temp/img/ritsemabanck-favicon.png' type='image/x-icon'/>
            <link type="text/css" rel="stylesheet" href="/temp/css/style.css"/>
      </head>
<body>
      <div class="row nopad">
            <nav class="twelve wide centered container">
                  <a href="/temp/jmh/home.php"><img class="navbar-logo" src="/temp/img/Ritsema%20Banck%20logo.png"></a>

                  <div class="navbar-menu-wrapper centered column">
                        <span id="openNav">&#9776;</span>
                  </div>

                  <div id="mobileNav" class="overlay">
                        <a href="javascript:void(0)" class="closebtn" id="closeNav">&times;</a>
                        <div class="overlay-content">
                              <a href="/temp/jmh/home.php">HOME</a>
                              <?php echo ($_SESSION["logged_in"] == false) ? '<a href="/temp/pieter/index.php">INLOGGEN</a>' : '<a href="/temp/Julian/overview.php">MIJN OVERZICHT</a>'; ?>
                              <a href="/temp/sietze/intranet/index.php">INTRANET</a>
                              <a href="/temp/jmh/contact.php">CONTACT</a>
                        </div>
                  </div>

                  <div class="nav-links">
                        <ul>
                            <li><a href="/temp/jmh/home.php">HOME</a></li>
                            <li><?php echo ($_SESSION["logged_in"] == false) ? '<a href="/temp/pieter/index.php">INLOGGEN</a>' : '<a href="/temp/Julian/overview.php">MIJN OVERZICHT</a>'; ?></li>
                            <li><a href="/temp/sietze/intranet/index.php">INTRANET</a></li>
                            <?php echo ($_SESSION["logged_in"] == true) ? '<li><a href="/temp/logout.php">UITLOGGEN</a></li>' : ''; ?>
                            <li><a href="/temp/jmh/contact.php">CONTACT</a></li>
                        </ul>
                  </div> 
            </nav>
      </div>


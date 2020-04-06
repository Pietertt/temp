<?php
      session_start();
      
      include($_SERVER['DOCUMENT_ROOT'] . "/temp/token.php");
      include($_SERVER['DOCUMENT_ROOT'] . "/temp/cookie.php");
      include($_SERVER['DOCUMENT_ROOT'] . "/temp/tok.php");
      include($_SERVER['DOCUMENT_ROOT'] . "/temp/session.php");
      include($_SERVER['DOCUMENT_ROOT'] . "/temp/user.php");
      include($_SERVER['DOCUMENT_ROOT'] . "/temp/database.php");

      // creates a new Cookie object
      $cookie = new Cookie("token");
      // checks if a cookie with a given name exists in the first place
      if($cookie->does_cookie_exist()){
            // checks if the cookie is verified
            if($cookie->validate_user($_COOKIE["token"])){
                  // sets the logged_in session to true
                  $_SESSION["logged_in"] = true;

                  // resets the timestamp by updating the cookie
                  $cookie->update();

                  // selects the information of the user based on the values stored in the token 
                  $database = new Database();
                  $database->connect("localhost", "root", "", "ritsemabanck");
                  $result = $database->fetch($database->select("SELECT * FROM User WHERE email = ?", array(Token::decode($cookie->get_value())->username)));
                  
                  // populates the User object with data from the database
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

                  // stores the User object in the session
                  $_SESSION["user"] = $user;

            // the token in the cookie is expired      
            } else {
                  $_SESSION["logged_in"] = false;

                  $cookie = new Cookie("token");
                  $_SESSION["logged_out"] = true;
                  $cookie->remove();
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
                              <?php echo ($_SESSION["logged_in"] == false) ? '<a href="http://localhost/temp/pieter/index.php">INLOGGEN</a>' : '<a href="http://localhost/temp/Julian/overview.php">MIJN OVERZICHT</a>'; ?>
                              <a href="http://localhost/temp/sietze/dashboard/index.php">INTRANET</a>
                              <a href="http://localhost/temp/jmh/contact.php">CONTACT</a>
                        </div>
                  </div>

                  <div class="nav-links">
                        <ul>
                            <li><a href="http://localhost/temp/jmh/home.php">HOME</a></li>
                            <li><?php echo ($_SESSION["logged_in"] == false) ? '<a href="http://localhost/temp/pieter/index.php">INLOGGEN</a>' : '<a href="http://localhost/temp/Julian/overview.php">MIJN OVERZICHT</a>'; ?></li>
                            <li><a href="http://localhost/temp/sietze/dashboard/index.php">INTRANET</a></li>
                            <?php echo ($_SESSION["logged_in"] == true) ? '<li><a href="http://localhost/temp/logout.php">UITLOGGEN</a></li>' : ''; ?>
                            <li><a href="http://localhost/temp/jmh/contact.php">CONTACT</a></li>
                        </ul>
                  </div> 
            </nav>
      </div>

      <?php
             if(isset($_SESSION["logged_out"])){
                  print("
                  <div class='twelve wide container'>
                        <div class='ten wide container'>
                              <div class='centered padded row'>
                                    <div class='twelve wide error column'>
                                          Oeps! Na een periode van 5 minuten inactiviteit is je sessie verlopen. Log alstublieft opnieuw in.
                                    </div>
                              </div>
                        </div>
                  </div>
                  ");
            }
      ?>


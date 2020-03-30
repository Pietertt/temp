<?php
      include("../includes/navbar.php");
      include("../database.php");

      $cookie = new Cookie("token");
      if($cookie->does_cookie_exist()){
            if($cookie->validate_user($_COOKIE["token"])){
                  $_SESSION["logged_in"] = true;
            } else {
                  header("Location: ../Pieter/index.php");
                  $_SESSION["logged_in"] = false;
            }
      } else {
            header("Location: ../Pieter/index.php");
      }

      if(session::is_private("dashboard")){
            if(isset($_SESSION["logged_in"])){
                  if($_SESSION["logged_in"] == false){
                        header("Location: ../Pieter/index.php");
                  }
            }
      }

      $database = new database();
      $database->connect("127.0.0.1", "root", "", "ritsemabanck");

      $cookie = new Cookie("token");
      $token = Token::decode($cookie->get_value());

      $stmt = $database->get_connection()->prepare("SELECT * FROM `user` WHERE email = ?");
      $stmt->bind_param("s", $e);
      $e = $token->username;
      $stmt->execute();
      $rows = $stmt->get_result()->fetch_assoc();

      $database->disconnect();
?>

<div class="ten wide container">
      <div class="row">
            <div class="twelve wide column">
                  <h1>Dashboard</h1>
            </div>
      </div>
      <div class="row">
            <div class="three wide column">
                  <h3>Persoonlijke gegevens</h3>
                  <p><b>Naam</b></p>
                  <p><b>Geslacht</b></p>
                  <p><b>Geboortedatum</b></p>
                  <p><b>Woonadres</b></p>
            </div>
            <div class="three wide column">
                  <h3>Contactgegevens</h3>
                  <p><b>Telefoonnummer</b></p>
                  <p><b>E-mailadres</b></p>
            </div>
      </div>
</div>

<?php
      include("../includes/footer.php");
?>
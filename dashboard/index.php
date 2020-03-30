<?php
      include("../includes/navbar.php");
      include("../database.php");
      include("../user.php");

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
      $row = $stmt->get_result()->fetch_assoc();

      $user = new User();
      $user->id = $row["id"];
      $user->firstname = $row["firstname"];
      $user->lastname = $row["lastname"];
      $user->gender = $row["gender"];
      $user->phone_number = $row["tnumber"];
      $user->email = $row["email"];
      $user->birth_date = $row["birth_date"];
      $user->residence = $row["residence"];
      $user->street = $row["street"];
      $user->house_number = $row["house_number"];
      $user->addition = $row["addition"];
      $user->postal_code = $row["postal_code"];

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
                  <p>
                        <b>Naam</b><br>
                        <?php print($user->firstname . " " . $user->lastname); ?>
                  </p>
                  <p>
                        <b>Geslacht</b><br>
                        <?php print($user->gender); ?>
                  </p>
                  <p>
                        <b>Geboortedatum</b><br>
                        <?php print($user->birth_date); ?>
                  </p>
                  <p>
                        <b>Woonadres</b><br>
                        <?php print($user->street . " " . $user->house_number . " " . $user->addition); ?><br>
                        <?php print($user->postal_code . ", " . $user->residence); ?>
                  </p>
            </div>
            <div class="three wide column">
                  <h3>Contactgegevens</h3>
                  <p>
                        <b>Telefoonnummer</b><br>
                        <?php print($user->phone_number); ?>
                  </p>
                  <p>
                        <b>E-mailadres</b><br>
                        <?php print($user->email); ?>
                  </p>
            </div>
      </div>
</div>

<?php
      include("../includes/footer.php");
?>
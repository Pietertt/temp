<?php
      include("../includes/navbar.php");

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
                        <div class="swipe_right item">
                              <span><b>Naam</b></span><br>
                              <span><?php print($user->firstname . " " . $user->lastname); ?></span>
                        </div>
                        <div class="swipe_right item">
                              <span><b>Geslacht</b></span><br>
                              <span><?php print($user->gender); ?></span>
                        </div>
                        <div class="swipe_right item">
                              <span><b>Geboortedatum</b></span><br>
                              <span><?php print($user->birth_date); ?></span>
                        </div>
                        <div class="swipe_right item">
                              <span><b>Woonadres</b></span><br>
                              <span><?php print($user->street . " " . $user->house_number . " " . $user->addition); ?></span><br>
                              <span><?php print($user->postal_code . ", " . $user->residence); ?></span>
                              <img id="residence" src="../img/pen.png" data-popup='{"title" : "Verander je adres", "inputs" : [{"description" : "Straat", "name" : "street", "id" : "input_street"}, {"description" : "Huisnummer", "name" : "house_number", "id" : "input_house_number"}, {"description" : "Toevoeging", "name" : "addition", "id" : "input_addition"}, {"description" : "Postcode", "name" : "postal_code", "id" : "input_postal_code"}, {"description" : "Plaats", "name" : "residence", "id" : "input_residence"}], "button" : {"label" : "Verstuur", "id" : "button_change_street"}}'>
                        </div>
            </div>
            <div class="three wide column">
                  <h3>Contactgegevens</h3>
                  <div class="swipe_right item">
                        <span><b>Telefoonnummer</b></span><br>
                        <span id="span_phone_number"><?php print($user->phone_number); ?></span>
                        <img id="phone_number" data-popup='{"title" : "Verander je telefoonnummer", "inputs" : [{"description" : "Telefoonnummer", "name" : "phone_number", "id" : "input_phone_number"}], "button" : { "label" : "Verstuur", "id" : "button_change_phone_number" }}' src="../img/pen.png">
                  </div>
                  <div class="swipe_right item">
                        <span><b>E-mailadres</b></span><br>
                        <span id="span_email"><?php print($user->email); ?></span>
                        <img id="email_adress" src="../img/pen.png" data-popup='{"title" : "Verander je e-mailadres", "inputs" : [{"description" : "E-mailadres", "name" : "email_address", "id" : "input_email_adress"}], "button" : {"label" : "Verstuur", "id" : "button_change_email"}}'>
                  </div>
            </div>
      </div>
</div>

<script src="../Pieter/popup/popup.js"></script>
<script src="dashboard.js"></script>

<?php
      include("../includes/footer.php");
?>
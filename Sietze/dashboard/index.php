<?php
      include("../../includes/navbar.php");

      if(isset($_POST["firstname"])){

         $firstname = $_POST["firstname"];
         $lastname = $_POST["lastname"];
         $sex = $_POST["sex"];
         $email = $_POST["email"];
         $phone = $_POST["phone"];
         $password = $_POST["password"];

         $database = new Database();
         $database->insert("INSERT INTO `user` 
                        (`username`,                        `password`,       `email`,    `BSN`,      `firstname`,      `lastname`,       `gender`,   `tnumber`) VALUES 
                        (?,                                 ?,                ?,          ?,          ?,                ?,                ?,          ?);",
                  array($firstname . " " . $lastname,       $password,         $email,      0,        $firstname,        $lastname,       $sex,       $phone));
         exit();
      }
?>
<form method="post">
      <div class="ten wide container">
            <div class="padded row">
                  <div class="six wide column">
                        <div class="row">
                              <h3>Gebruiker toevoegen</h3>
                        </div>
                        <div class="row">
                              <label>Voornaam</label>
                              <input type="text" name="firstname">
                        </div>
                        <div class="row">
                              <label>Achternaam</label>
                              <input type="text" name="lastname">
                        </div>
                        <div class="row">
                              <label>Geslacht</label>
                              <select name="sex">
                                    <option value="Man">Man</option>
                                    <option value="Vrouw">Vrouw</option>
                              </select>
                        </div>
                        <div class="row">
                              <label>E-mailadres</label>
                              <input type="text" name="email">
                        </div>
                        <div class="row">
                              <label>Telefoonnummer</label>
                              <input type="text" name="phone">
                        </div>
                        <div class="row">
                              <label>Wachtwoord</label>
                              <input type="password" name="password">
                        </div>
                        <div class="row">
                              <button class="twelve wide blue button">Versturen</button>
                        </div>
                  </div>
            </div>
      </div>
</form>
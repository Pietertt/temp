<?php 
      require('../includes/header.php');
      require('../includes/navbar.php');
?>

            <div class="five wide white rounded container" >

                  <div class="ten wide container">
                        <div class="padded row">
                              <div class="six wide centered column">
                                    <button class="ten wide blue button">Inloggen</button>
                              </div>
                              <div class="six wide centered column">
                                    <button class="ten wide blue inverted button">Registreren</button>
                              </div>
                        </div>
                  </div>

                  <div id="container" class="ten wide container">
                        <div class="row">
                              <div class="twelve wide column">
                                    <label for="email">E-mailadres</label>
                                    <input id="email" name="email" type="email" id="email" placeholder="Voer je e-mail in">
                              </div>
                        </div>

                        <div class="row">
                              <div class="twelve wide column">
                                    <label for="password">Wachtwoord</label>
                                    <input id="password" name="password" type="password" id="password" placeholder="Voer je wachtwoord in">
                              </div>
                        </div>

                        <div class="row">
                              <div class="twelve wide column">
                                    <button class="twelve wide blue button" id="submit">Versturen</div></button>
                              </div>
                        </div>
                  </div>

            </div>
            <script src="popup/popup.js"></script>
            <script src="binding.js"></script>

<?php require('../includes/footer.php');?>
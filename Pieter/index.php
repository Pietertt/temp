<!DOCTYPE html>
<html>
      <header>
            <link rel="stylesheet" href="../style.css">
      </header>
      <body>

            <div class="four wide container">
                  <div class="row">
                        <div class="four wide column">
                              <h3 class="selected">Inloggen</h3>
                        </div>
                        <div class="four wide column">
                              <h3 class="deselected">Registreren</h3>
                        </div>
                  </div>
            </div>
            <div class="four wide container">
                  <form action="post">
                        <div class="row">
                              <div class="twelve wide column">
                                    <label for="email">E-mailadres</label>
                                    <input id="email" name="email" type="email" required>
                              </div>
                        </div>

                        <div class="row">
                              <div class="twelve wide column">
                                    <label for="password">Wachtwoord</label>
                                    <input id="password" name="password" type="password" required>
                              </div>
                        </div>

                        <div class="row">
                              <div class="twelve wide column">
                                    <button class="blue button">Versturen</button>
                              </div>
                        </div>
                  </form>
            </div>
      </body>
</html>
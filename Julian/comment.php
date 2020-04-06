<?php
require("../includes/navbar.php");

//voorkomt SQL injection naar database
function ExtendedAddslash(&$params)
{
    foreach ($params as &$var) {
        is_array($var) ? ExtendedAddslash($var) : $var = addslashes($var);
    }
    //function for every POST variable.
    ExtendedAddslash($_POST);
}

      if(isset($_POST["message"])){
            $message = $_POST["message"];
            
            $database = new Database();
            $database-
      }

?>

<form method="post" action="">
      <div class="row toppad">
            <div class="five wide centered container">
                  <div class="ten wide container">
                        <div class="row">
                              <h3>Plaats uw opmerking</h3>
                              <textarea id="message" name="message" placeholder="Typ hier uw bericht." rows="5" cols="50"></textarea>
                        </div>   
                        <div class="row">
                              <button class="twelve wide blue button">Verstuur</button>
                        </div>   
                  </div>
            </div>
      </div>
</form>

<?php require('../includes/footer.php');?>

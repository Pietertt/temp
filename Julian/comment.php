<?php

//voorkomt SQL injection naar database
function ExtendedAddslash(&$params)
{
    foreach ($params as &$var) {
        is_array($var) ? ExtendedAddslash($var) : $var = addslashes($var);
    }

    //function for every POST variable.
    ExtendedAddslash($_POST);


    require("../includes/navbar.php");
}

?>

<div class="row toppad">
    <div class="five wide centered container">
        <div class="ten wide container">
            <h3>Plaats uw opmerking</h3>
                <textarea id="message" placeholder="Typ hier uw bericht." rows="5" cols="50"></textarea>
        </div>
    </div>
</div>

<div class="row toppad container">
<div class="five wide centered column container"></div>

    <div class="two wide container">
<button class="twelve wide blue button"><a href="../" </a> Verstuur</button>
    </div>
</div>


<?php require('../includes/footer.php');?>

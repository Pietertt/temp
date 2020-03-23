<?php require("../includes/navbar.php");
require("../jmh/contactvalidations.php");
?>


<div class="five wide white rounded container">
<div class="ten wide container">
    <form method="post">
        <div class="row">
            <div class="twelve wide column">
                <label for="name">Naam</label>
                <input id="name" name="name" type="text" placeholder="Uw naam" required>
            </div>
        </div>

        <div class="row">
            <div class="twelve wide column">
                <label for="email">E-mailadres</label>
                <input id="email" name="email" type="email" placeholder="Uw email adres" required>
            </div>
        </div>

        <div class="row">
            <div class="twelve wide column">
                <label for="message">Bericht</label>
                <input id="message" name="message" type="text" placeholder="Typ hier uw bericht.." required>
            </div>
        </div>

        <div class="row">
            <div class="twelve wide column">
                <button class="twelve wide blue button">Versturen</button>
            </div>
        </div>
    </form>
</div>
</div>


<?php require('../includes/footer.php');?>

<?php require("../includes/navbar.php");
require("../contactvalidations.php");
?>

<div class="row toppad">
    <div class="five wide centered container">
        <div class="ten wide container">
            <h3>Contactformulier</h3>
        </div>
    </div>
</div>

<div class="five wide white rounded container">
<div class="ten wide container">
        <div class="row">
            <div class="twelve wide column">
                <label for="name">Naam</label>
                <input id="name" name="name" type="text" placeholder="Uw naam">
            </div>
        </div>

        <div class="row">
            <div class="twelve wide column">
                <label for="email">E-mailadres</label>
                <input id="email" name="email" type="text" placeholder="Uw email adres">
            </div>
        </div>

        <div class="row">
            <div class="twelve wide column">
                <label for="message">Bericht</label>
                <textarea id="message" name="message" type="text" placeholder="Typ hier uw bericht.." rows="5" cols="30"></textarea>
            </div>
        </div>

        <div id="errorfield" class="invisible error">
        <div class="row">
            <div class="twelve wide column">
                <p id="errormessage">JE SHIT IS STUK</p>
            </div>
        </div>
        </div>

        <div class="row">
            <div class="twelve wide column">
                <button id="submit" class="twelve wide blue button">Versturen</button>
            </div>
        </div>
</div>
</div>


<script src="error.js"></script>

<?php require('../includes/footer.php');?>

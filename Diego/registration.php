<?php
require_once ("../Diego/classes/naamValidation.php");
$nameVal = new classes\naamValidation;
require_once ("../Diego/classes/geslachtValidation.php");
$sexVal = new classes\geslachtValidation;
require_once ("../Diego/classes/emailValidation.php");
$emailVal = new classes\emailValidation;
require_once ("../Diego/classes/telefoonValidation.php");
$phoneVal = new classes\telefoonValidation;
require_once ("../Diego/classes/wachtwoordValidation.php");
$pwVal = new classes\wachtwoordValidation;

$firstNameState = 'true';
$lastNameState = 'true';
$sexState = 'true';
$emailState = 'true';
$phoneState = 'true';
$pwState = 'true';
$pwReState = 'true';

require ('../includes/navbar.php');

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $nameVal->checkOnlyLettersFirstName($_POST["firstName"]);
    if ($nameVal->getFirstName() == $_POST["firstName"])
    {
        $firstNameState = 'true';
    }
    else
    {
        $firstNameState = 'false';
    }

    $nameVal->checkOnlyLettersLastName($_POST["lastName"]);
    if ($nameVal->getLastName() == $_POST["lastName"])
    {
        $lastNameState = 'true';
    }
    else
    {
        $lastNameState = 'false';
    }

    $sexVal->checkOnlyLettersSex($_POST["sex"]);
    if ($sexVal->getSex() == $_POST["sex"])
    {
        $sexState = 'true';
    }
    else
    {
        $sexState = 'false';
    }

    $emailVal->validateEmail($_POST["email"]);
    if ($emailVal->getEmail() == $_POST["email"])
    {
        $emailState = 'true';
    }
    else
    {
        $emailState = 'false';
    }

    $phoneVal->checkOnlyNumbers($_POST["phone"]);
    if ($phoneVal->getPhone() == $_POST["phone"])
    {
        $phoneState = 'true';
    }
    else
    {
        $phoneState = 'false';
    }

    $pwVal->testSpecialCharacter($_POST["password"]);
    if ($pwVal->getPassword() == $_POST["password"])
    {
        $pwState = 'true';
    }
    else
    {
        $pwState = 'false';
    }
    if ($_POST["password"] != $_POST["passwordRepeat"])
    {
        $pwReState = 'false';
    }
    else
    {
        $pwReState = 'true';
    }
}

?>
    <div class="five wide white rounded container" >

        <div class="ten wide container">
            <div class="padded row">
                <div class="six wide centered column">
                    <button class="ten wide blue inverted button"><a href="../Pieter/index.php">Inloggen</a></button>
                </div>
                <div class="six wide centered column">
                    <button class="ten wide blue button">Registreren</button>
                </div>
            </div>
        </div>

        <div id="container" class="ten wide container">
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <div class="row">
                    <div class="twelve wide column">
                        <label for="firstName">Voornaam</label>
                        <input id="firstName" name="firstName" type="text" placeholder="Voer je voornaam in">
                        <?php
                        if($firstNameState == 'false')
                        {
                            echo "test";
                        }
                        ?>
                    </div>
                </div>

                <div class="row">
                    <div class="twelve wide column">
                        <label for="lastName">Achternaam</label>
                        <input id="lastName" name="lastName" type="text" placeholder="Voer je achternaam in">
                        <?php
                        if($lastNameState == 'false')
                        {
                            echo "test";
                        }
                        ?>
                    </div>
                </div>

                <div class="row">
                    <div class="twelve wide column">
                        <label for="sex">Geslacht:</label>
                        <select id="sex" name="sex">
                            <option value="Man">Man</option>
                            <option value="Vrouw">Vrouw</option>
                            <option value="Anders">Anders</option>
                        </select>
                        <?php
                        if($sexState == 'false')
                        {
                            echo "test";
                        }
                        ?>
                    </div>
                </div>

                <div class="row">
                    <div class="twelve wide column">
                        <label for="email">E-mail</label>
                        <input id="email" name="email" type="email" placeholder="Voer je E-mail in">
                        <?php
                        if($emailState == 'false')
                        {
                            echo "test";
                        }
                        ?>
                    </div>
                </div>

                <div class="row">
                    <div class="twelve wide column">
                        <label for="phone">Telefoon nummer</label>
                        <input id="phone" name="phone" type="number" placeholder="Voer je telefoon nummer in">
                        <?php
                        if($phoneState == 'false')
                        {
                            echo "test";
                        }
                        ?>
                    </div>
                </div>

                <div class="row">
                    <div class="twelve wide column">
                        <label for="password">Wachtwoord</label>
                        <input id="password" name="password" type="password" placeholder="Voer je wachtwoord in">
                        <?php
                        if($pwState == 'false')
                        {
                            echo "test";
                        }
                        ?>
                    </div>
                </div>

                <div class="row">
                    <div class="twelve wide column">
                        <label for="passwordRepeat">Herhaal wachtwoord</label>
                        <input id="passwordRepeat" name="passwordRepeat" type="password" placeholder="Voer je wachtwoord opnieuw in">
                        <?php
                        if($pwReState == 'false')
                        {

                            echo "test";

                        }
                        ?>
                    </div>
                </div>

                <div class="row">
                    <div class="twelve wide column">
                        <button class="twelve wide blue button" id="submit">Versturen</div></button>
                </div>
            </form>
        </div>
    </div>

    </div>
    <script src="popup/popup.js"></script>
    <script src="binding.js"></script>

<?php require('../includes/footer.php');?>
<?php
require ('../includes/navbar.php');



if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    require_once __DIR__ . "/classes/naamValidation.php";
    $nameVal = new classes\naamValidation;

    require_once __DIR__ . "/classes/geslachtValidation.php";
    $sexVal = new classes\geslachtValidation;

    require_once __DIR__ . "/classes/emailValidation.php";
    $emailVal = new classes\emailValidation;

    require_once  __DIR__ . "/classes/wachtwoordValidation.php";
    $pasVal = new classes\wachtwoordValidation;


    $nameVal->checkOnlyLettersFirstName($_POST["firstName"]);
    $nameVal->checkOnlyLettersLastName($_POST["lastName"]);

    $sexVal->checkOnlyLettersSex($_POST["sex"]);

    $emailVal->validateEmail($_POST["email"]);

    $pasVal->testSpecialCharacter($_POST["password"]);


    echo $nameVal->getFirstName();
    echo "<br>";
    echo $nameVal->getLastName();
    echo "<br>";
    echo $sexVal->getSex();
    echo "<br>";
    echo $emailVal->getEmail();
    echo "<br>";
    echo $pasVal->getPassword();
    echo "<br>";
    if ($_POST["password"] == $_POST["passwordRepeat"])
    {
        echo $_POST["passwordRepeat"];
    }
}
?>

    <div class="five wide white rounded container" >

        <div class="ten wide container">
            <div class="padded row">
                <div class="six wide centered column">
                    <a href="../Pieter/index.php"><button class="ten wide blue inverted button">Inloggen</button></a>
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
                    </div>
                </div>

                <div class="row">
                    <div class="twelve wide column">
                        <label for="lastName">Achternaam</label>
                        <input id="lastName" name="lastName" type="text" placeholder="Voer je achternaam in">
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
                    </div>
                </div>

                <div class="row">
                    <div class="twelve wide column">
                        <label for="email">E-mail</label>
                        <input id="email" name="email" type="email" placeholder="Voer je E-mail in">
                    </div>
                </div>

                <div class="row">
                    <div class="twelve wide column">
                        <label for="phoneNumber">Telefoon nummer</label>
                        <input id="phoneNumber" name="phoneNumber" type="number" placeholder="Voer je telefoon nummer in">
                    </div>
                </div>

                <div class="row">
                    <div class="twelve wide column">
                        <label for="password">Wachtwoord</label>
                        <input id="password" name="password" type="password" placeholder="Voer je wachtwoord in">
                    </div>
                </div>

                <div class="row">
                    <div class="twelve wide column">
                        <label for="passwordRepeat">Herhaal wachtwoord</label>
                        <input id="passwordRepeat" name="passwordRepeat" type="password" placeholder="Voer je wachtwoord opnieuw in">
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
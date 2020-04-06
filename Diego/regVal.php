<?php
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

    require_once __DIR__ . "/classes/databaseValidation.php";
    $db = new classes\databaseValidation;

    require_once __DIR__ . "/classes/telefoonValidation.php";
    $phoneVal = new classes\telefoonValidation();

    require_once __DIR__ . "/classes/databaseValidation.php";
    $db = new classes\databaseValidation;


    if ($_POST["firstName"] != '') {
        $nameVal->checkOnlyLettersFirstName($_POST["firstName"]);
        echo "shits going wrong";
    }
    if ($_POST["lastName"] != '') {
        $nameVal->checkOnlyLettersLastName($_POST["lastName"]);
    }

    if ($_POST["sex"] != '') {
        $sexVal->checkOnlyLettersSex($_POST["sex"]);
    }

    if ($_POST["email"] != '') {
        $emailVal->validateEmail($_POST["email"]);
    }

    if ($_POST["phoneNumber"] != ''){
        $phoneVal->valPhone($_POST["phoneNumber"]);
    }

    if ($_POST["password"] != ''){
        $pasVal->testSpecialCharacter($_POST["password"]);
    }


    $firstNameState = 'false';
    $lastNameState = 'false';
    $sexState = 'false';
    $emailState = 'false';
    $phoneState = 'false';
    $pasState = 'false';
    $pasReState = 'false';

    $emailDBState = 'false';


    if ($nameVal->getFirstName() == $_POST["firstName"] & $_POST["firstName"] != '')
    {
        echo $nameVal->getFirstName();
        echo "<br>";

        $firstNameState = 'true';
    }
    if ($nameVal->getLastName() == $_POST["lastName"] & $_POST["lastName"] != '')
    {
        echo $nameVal->getLastName();
        echo "<br>";

        $lastNameState = 'true';
    }
    if ($sexVal->getSex() == $_POST["sex"] & $_POST["sex"] != '')
    {
        echo $sexVal->getSex();
        echo "<br>";

        $sexState = 'true';
    }
    if ($emailVal->getEmail() == $_POST["email"] & $_POST["email"] != '')
    {
        echo $emailVal->getEmail();
        echo "<br>";

        $emailState = 'true';
    }
    if ($db->checkEmail(htmlspecialchars($_POST["email"])))
    {
        $emailDBState = 'true';
    }
    if ($phoneVal->getPhone() == $_POST["phoneNumber"] & $_POST["phoneNumber"] != '')
    {
        echo $phoneVal->getPhone();
        echo "<br>";

        $phoneState = 'true';
    }
    if ($pasVal->getPassword() == $_POST["password"] & $_POST["password"] != '')
    {
        echo $pasVal->getPassword();
        echo "<br>";

        $pasState = 'true';
    }
    if ($_POST["password"] == $_POST["passwordRepeat"] & $_POST["passwordRepeat"] != '')
    {
        echo $_POST["passwordRepeat"];
        echo "<br>";

        $pasReState = 'true';
    }
    if ($firstNameState == 'true' & $lastNameState == 'true' & $sexState == 'true' & $emailState == 'true' & $pasState == 'true' & $pasReState == 'true' & $phoneState == 'true' & $emailDBState == 'true')
    {
        echo "<br>";
        echo "validation passed";

        if ($db->insertIntoDB(htmlspecialchars($emailVal->getEmail()), htmlspecialchars($pasVal->getPassword()), "012346789", htmlspecialchars($nameVal->getFirstName()), htmlspecialchars($nameVal->getLastName()), htmlspecialchars($sexVal->getSex()), htmlspecialchars($phoneVal->getPhone())) == true)
        {
            header("location: ../Pieter/index.php");
            exit();
        }
    }
    else
    {
            header("location: ../Diego/registration.php?X=1&FNS=".$firstNameState."&FN=".$_POST["firstName"]."&LNS=".$lastNameState."&LN=".$_POST["lastName"]."&SS=".$sexState."&S=".$_POST["sex"]."&ES=".$emailState."&E=".$_POST["email"]."&PS=".$phoneState."&P=".$_POST["phoneNumber"]."&PWS=".$pasState."&PWRS=".$pasState."&EDBS=".$emailDBState);
            exit();
    }
}
?>
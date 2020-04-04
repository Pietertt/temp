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


    $nameVal->checkOnlyLettersFirstName($_POST["firstName"]);
    $nameVal->checkOnlyLettersLastName($_POST["lastName"]);

    $sexVal->checkOnlyLettersSex($_POST["sex"]);

    $emailVal->validateEmail($_POST["email"]);

    $pasVal->testSpecialCharacter($_POST["password"]);


    $firstNameState = false;
    $lastNameState = false;
    $sexState = false;
    $emailState = false;
    $pasState = false;
    $pasReState = false;


    if ($nameVal->getFirstName() == $_POST["firstName"])
    {
        echo $nameVal->getFirstName();
        echo "<br>";

        $firstNameState = true;
    }
    if ($nameVal->getLastName() == $_POST["lastName"])
    {
        echo $nameVal->getLastName();
        echo "<br>";

        $lastNameState = true;
    }
    if ($sexVal->getSex() == $_POST["sex"])
    {
        echo $sexVal->getSex();
        echo "<br>";

        $sexState = true;
    }
    if ($emailVal->getEmail() == $_POST["email"])
    {
        echo $emailVal->getEmail();
        echo "<br>";

        $emailState = true;
    }
    if ($pasVal->getPassword() == $_POST["password"])
    {
        echo $pasVal->getPassword();
        echo "<br>";

        $pasState = true;
    }
    if ($_POST["password"] == $_POST["passwordRepeat"])
    {
        echo $_POST["passwordRepeat"];
        echo "<br>";

        $pasReState = true;
    }

    if ($firstNameState == true & $lastNameState == true & $sexState == true & $emailState == true & $pasState == true & $pasReState == true)
    {
        echo "<br>";
        echo "validation passed";

        if ($db->insertIntoDB($emailVal->getEmail(), $pasVal->getPassword(), "012346789", $nameVal->getFirstName(), $nameVal->getLastName(), $sexVal->getSex()) == true)
        {
            header("location: ../Pieter/index.php");
            exit();
        }
    }
}
?>
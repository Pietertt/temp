<?php

namespace classes;

class registratieController
{
    public function validateAll($firstName, $lastName, $sex, $email, $phone, $password)
    {
        require_once __DIR__ . "/../classes/naamValidation.php";
        $nameVal = new naamValidation;
        require_once __DIR__ . "/../classes/geslachtValidation.php";
        $sexVal = new geslachtValidation;
        require_once __DIR__ . "/../classes/emailValidation.php";
        $emailVal = new emailValidation;
        require_once __DIR__ . "/../classes/telefoonValidation.php";
        $phoneVal = new telefoonValidation;
        require_once __DIR__ . "/../classes/wachtwoordValidation.php";
        $pwVal = new wachtwoordValidation;

        $nameVal->checkOnlyLettersFirstName($firstName);
        $nameVal->checkOnlyLettersLastName($lastName);

        $sexVal->checkOnlyLettersSex($sex);

        $emailVal->validateEmail($email);

        $phoneVal->checkOnlyNumbers($phone);

        $pwVal->testSpecialCharacter($password);
    }
}
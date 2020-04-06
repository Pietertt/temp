<?php


if (isset($_POST['submit'])) {

    $birthdate = $_POST['birthdate'];
    $gross_anual_income = $_POST['gross_anual_income'];
    $input_money = $_POST['input_money'];
    $dept = $_POST['dept'];
    $purchase_price = $_POST['purchase_price'];
    $email = $_POST['email'];
    $mortgage_duration = $_POST['mortgage_duration'];
    $bank_number = $_POST['bank_number'];

    //calculationvariables

    $housing_ratio = 0.265;
    $maximum_gross_mortgage_burden = $gross_anual_income * $housing_ratio;

    if ($mortgage_duration == 5) {
        $key_interest = 1.05;
    }
    elseif ($mortgage_duration == 10) {
        $key_interest = 1.036;
    }
    elseif ($mortgage_duration == 15) {
        $key_interest = 1.04;
    }
    else {
    $key_interest = 1.036;
    }

    $mortgage = $maximum_gross_mortgage_burden * $mortgage_duration * $key_interest;

    if (empty($birthdate) || empty($email) || empty($gross_anual_income) || empty($input_money) || empty($dept) || empty($purchase_price) || empty($mortgage_duration) || empty($bank_number)) {
        header("Location: ../jmh/mortgagerequest.php?mortgagerequest=empty&birthdate=$birthdate&gross_anual_income=$gross_anual_income&input_money=$input_money&dept=$dept&purchase_price=$purchase_price&email=$email&mortgage_duration=$mortgage_duration&bank_number=$bank_number");
        exit();
    }
    elseif (!preg_match("^\\d{2}/\\d{2}/\\d{4}^", $birthdate)) {
        header("Location: ../jmh/mortgagerequest.php?mortgagerequest=invaliddate&birthdate=$birthdate&gross_anual_income=$gross_anual_income&input_money=$input_money&dept=$dept&purchase_price=$purchase_price&email=$email&mortgage_duration=$mortgage_duration&bank_number=$bank_number");
    }
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../jmh/mortgagerequest.php?mortgagerequest=invalidemail&birthdate=$birthdate&gross_anual_income=$gross_anual_income&input_money=$input_money&dept=$dept&purchase_price=$purchase_price&email=$email&mortgage_duration=$mortgage_duration&bank_number=$bank_number");
        exit();
    }
    elseif (!is_numeric($gross_anual_income) || !is_numeric($dept) || !is_numeric($purchase_price) || !is_numeric($mortgage_duration)) {
        header("Location: ../jmh/mortgagerequest.php?mortgagerequest=number&birthdate=$birthdate&gross_anual_income=$gross_anual_income&input_money=$input_money&dept=$dept&purchase_price=$purchase_price&email=$email&mortgage_duration=$mortgage_duration&bank_number=$bank_number");
        exit();
    }
    elseif (!strlen($bank_number) == 18) {
        header("Location: ../jmh/mortgagerequest.php?mortgagerequest=bank_number_length&birthdate=$birthdate&gross_anual_income=$gross_anual_income&input_money=$input_money&dept=$dept&purchase_price=$purchase_price&email=$email&mortgage_duration=$mortgage_duration&bank_number=$bank_number");
        exit();
    }
    else {
        $to = "ritsemabanck@gmail.com"; // this is your Email address
        $subject = "Hypotheek aanvraag";
        $message = "Geboortedatum: " . $birthdate . "\n" . "Bruto jaarlijks inkomen: " . $gross_anual_income . "\n" . "Eigen inbreng: " . "\n" . $input_money . "\n" . "Schulden: " . $dept . "\n" . "Koopprijs : " . $purchase_price . "Email : " . $email . "Hypotheek duratie : " . $mortgage_duration . "\n" . "Bankrekeningnummer: " . $bank_number;
        $headers = "From: " . $email;
        mail($to, $subject, $message, $headers);
        mail($email, "Kopie hypotheekaanvraag", $message, "From: " . $to);

        header("Location: ../jmh/index.php?submitted_form=mortgage_request&mortgage=$mortgage");
        exit();
    }




}


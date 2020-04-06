<?php


if (isset($_POST['submit'])) {

    $gross_anual_income = $_POST['gross_anual_income'];
    $input_money = $_POST['input_money'];
    $dept = $_POST['dept'];
    $purchase_price = $_POST['purchase_price'];
    $mortgage_duration = $_POST['mortgage_duration'];

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

    if (empty($gross_anual_income) || empty($input_money) || empty($dept) || empty($purchase_price) || empty($mortgage_duration))
    {
        header("Location: ../jmh/mortgagecalculator.php?mortgagecalculator=empty&gross_anual_income=$gross_anual_income&input_money=$input_money&dept=$dept&purchase_price=$purchase_price&mortgage_duration=$mortgage_duration");
        exit();
    }
    elseif (!is_numeric($gross_anual_income) || !is_numeric($dept) || !is_numeric($purchase_price) || !is_numeric($mortgage_duration)) {
        header("Location: ../jmh/mortgagecalculator.php?mortgagecalculator=number&gross_anual_income=$gross_anual_income&input_money=$input_money&dept=$dept&purchase_price=$purchase_price&mortgage_duration=$mortgage_duration");
        exit();
    }
    else {
        header("Location: ../jmh/index.php?submitted_form=mortgage_request&mortgage=$mortgage");
        exit();
    }
}


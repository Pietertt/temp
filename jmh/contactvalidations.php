<?php

$name = $email = $message = "";
$nameErr = $emailErr = $messageErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    print 'it works';
}
    else {
        print 'no it dont';
}

if (isset($_POST['submit'])) {

    if (empty($_POST["name"])) {
        $nameErr = "Please enter a name";
    } else {
        $name = form_input($_POST["name"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
            $nameErr = "Only letters and white space allowed";
        }
    }

    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
        array_push($errors,$emailErr);
    } else {
        $email = form_input($_POST["email"]);
        // check if e-mail address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
            array_push($errors,$emailErr);
        }
    }

    if (empty($_POST["message"])) {
        $messageErr = "Please enter a message";
        array_push($errors,$messageErr);
    } else {
        $message = form_input($_POST["message"]);
    }

    if ($nameErr == null && $emailErr == null && $messageErr == null) {

        $to = "janminne@gmail.com"; // this is your Email address
        $subject = "Contact form: " . $name;
        $message = "Naam: " . $name . "\n" . "Emailadres: " . $email . "\n" . "Bericht:" . "\n\n" . $message;
        $headers = "From: " . $email;
        mail($to, $subject, $message, $headers);
        mail($email, "Kopie mail contactformulier", $message, "From: Ritsema Banck");

        header('Location: http://localhost/temp/jmh/index.php');
        exit();
    } else {
        header('Location: http://localhost/temp/jmh/contact.php');
    }

}


function form_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
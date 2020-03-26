<?php

$nameErr = $emailErr = $messageErr = "";
$name = $email = $message = "";

if(isset($_POST["name"])){
      print("working");
} else {
      print("Broken");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if ($_POST["name"] == "") {
        echo $nameErr = "Please enter a name";
    } else {
        $name = form_input($_POST["name"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
            echo $nameErr = "Only letters and white space allowed";
        }
    }
    if ($_POST["email"] == "") {
        echo $emailErr = "Email is required";
    } else {
        $email = form_input($_POST["email"]);
        // check if e-mail address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo $emailErr = "Invalid email format";
            exit();
        }
    }
    if ($_POST["comment"] == "") {
        echo $messageErr = "Please enter a message";
    } else {
        $message = form_input($_POST["comment"]);
    }
    if($nameErr == "" && $emailErr == "" && $messageErr == "") {

        $to = "janminne@gmail.com"; // this is your Email address
        $subject = "Contact form: " . $name;
        $message = "Naam: " . $name . "\n" . "Emailadres: " . $email . "\n" . "Bericht:" . "\n\n" . $message;
        $headers = "From: " . $email;
        mail($to,$subject,$message,$headers);
        mail($email, "Kopie mail contactformulier", $message, "From: Ritsema Banck");

        header('Location: http://localhost/temp/jmh/index.php');
        exit();
    }
    else {
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

?>



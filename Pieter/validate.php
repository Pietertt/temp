<?php
      $email = $_POST["email"];
      $password = $_POST["password"];

      function validate($email, $password){
            $mail = "pieter@boersma.nl";
            $pwd = "test123";
            if($mail == $email){
                  if($pwd == $password){
                        return "true";
                  } else {
                        return "Er ging iets mis, je wachtwoord komt niet overeen met je e-mailadres";
                  }
            } else {
                  return "Er ging iets mis, je wachtwoord komt niet overeen met je e-mailadres";
            }
      }

      print(validate($email, $password));
?>
<?php
      include_once("classes/validate.php");

      $email = $_POST["email"];
      $password = $_POST["password"];

      $validation = new validation($email, $password);
      if($validation->filter_length($email)){
            if($validation->filter_length($password)){
                  if($validation->filter_characters($password)){
                        if($validation->validate_email($email)){
                              if($validation->validate()){
                                    print("true");
                              } else {
                                    print_r($validation->get_errors());
                              }
                        } else {
                              print_r($validation->get_errors());
                        }
                  } else {
                        print_r($validation->get_errors());
                  }
            } else {
                  print_r($validation->get_errors());
            }
      } else {
            print_r($validation->get_errors());
      }
?>
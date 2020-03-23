<?php
      include_once("../validate.php");

      if((isset($_POST["email"])) && (isset($_POST["password"]))){
            $email = $_POST["email"];
            $password = $_POST["password"];

            $validation = new validation();
            if($validation->filter_length($email)){
                  if($validation->filter_length($password)){
                        if($validation->filter_characters($password)){
                              if($validation->validate_email($email)){
                                    if($validation->validate_user($email, $password)){
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
      }

      if(isset($_POST["code"])){
            $code = $_POST["code"];
            
            $validation = new validation();
            if($validation->filter_length($code)){
                  if($validation->filter_characters($code)){
                        if($validation->validate_code($code)){
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
      }
?>
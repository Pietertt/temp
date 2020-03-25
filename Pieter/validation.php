<?php
      include_once("../validate.php");
      include_once("../token.php");
      include_once("../cookie.php");

      if((isset($_POST["email"])) && (isset($_POST["password"]))){
            $email = $_POST["email"];
            $password = $_POST["password"];
            $validation = new validation();

            if(validation::filter_length($email)){
                  if(validation::filter_length($password)){
                        if(validation::filter_characters($password)){
                              if(validation::validate_email($email)){
                                    if(validation::validate_user($email, $password)){
                                          $token = new Token($email, $password);
                                          $cookie = new Cookie("token");
                                          $cookie->set($token->get_token());
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
            if(validation::filter_length($code)){
                  if(validation::filter_characters($code)){
                        if(validation::filter_alphanumeric($code)){
                              if(validation::validate_code($code)){
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
      }

      if(isset($_POST["number"])){
            $number = $_POST["number"];
            
            $validation = new validation();
            if($validation->filter_length($number)){
                  if($validation->filter_characters($number)){
                        if($validation->filter_alphanumeric($number)){
                              if($validation->validate_number($number)){
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
      }
?>
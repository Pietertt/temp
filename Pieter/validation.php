<?php
      include_once("../validate.php");
      include_once("../token.php");
      include_once("../cookie.php");

      if((isset($_POST["email"])) && (isset($_POST["password"]))){
            $email = $_POST["email"];
            $password = $_POST["password"];
            $validation = new validation();

            if($validation->filter_length($email)){
                  if($validation->filter_length($password)){
                        if($validation->filter_characters($password)){
                              if($validation->validate_email($email)){
                                    if($validation->validate_user($email, $password)){
                                          $cookie = new Cookie("token");
                                          $cookie->create(Token::encode($email, $password, time(), 0));
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
                        if($validation->filter_alphanumeric($code)){
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
                                    $cookie = new Cookie("token");
                                    $token = $cookie->get_value();
                                    $decoded = Token::decode($token);
                                    $verified = Token::verify($decoded);
                                    $decoded = Token::encode($verified["username"], $verified["password"], $verified["timestamp"], $verified["verified"]);
                                    $cookie->create($decoded);
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
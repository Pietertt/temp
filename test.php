<?php
      require("cookie.php");
      require("token.php");


      $cookie = new Cookie("token");
      $value = $cookie->get_value();
      $token = new Token();
      
      $string = $token->decode($value);

      print_r($string);

?>
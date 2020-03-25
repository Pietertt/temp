<?php
      require("cookie.php");
      require("token.php");


      $cookie = new Cookie("token");
      
      $token = new Token("email", "password");
      print_r($token);
      $token->verify();

      print("<br>");
      print_r($token);

      print("<br>");

      print_r($token->decode());

?>
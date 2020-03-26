<?php
      require("cookie.php");
      require("token.php");


      $cookie = new Cookie("token");
      

      $verified = Token::verify(Token::decode($cookie->get_value()));

      print_r($verified);
      

?>
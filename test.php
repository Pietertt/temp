<?php
      require("cookie.php");
      require("token.php");


      $cookie = new Cookie("token");
      

      $cookie->create(Token::encode("test@test.nl", "password", time(), 0));
      print_r(Token::decode($cookie->get_value()));
?>
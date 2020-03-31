<?php
      require("cookie.php");
      require("token.php");
      require("tok.php");


      $cookie = new Cookie("token");
      

      $cookie->create(Token::encode("thomas@ziggo.nl", "39843", time(), 1));
      
?>
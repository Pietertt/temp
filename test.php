<?php
      require("cookie.php");
      require("token.php");


      $cookie = new Cookie("token");
      
      print_r($cookie->check_expiration_date($cookie->get_value()));
?>
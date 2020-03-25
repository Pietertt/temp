<?php
      require("cookie.php");
      $cookie = new Cookie("test", "test", time(), "/");
      print_r($cookie->check_expiration_date());
?>
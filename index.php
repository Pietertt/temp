<?php
      session_start();
      
      include("token.php");
      include("cookie.php");
      include("tok.php");

      $cookie = new Cookie("token");
      if($cookie->validate_user($_COOKIE["token"])){

      }

      include("includes/navbar.php");
?>

<?php
      include("includes/footer.php");
?>
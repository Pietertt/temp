<?php
      include("../includes/navbar.php");

      $cookie = new Cookie("token");
      if($cookie->does_cookie_exist()){
            if($cookie->validate_user($_COOKIE["token"])){
                  $_SESSION["logged_in"] = true;
            } else {
                  header("Location: ../Pieter/index.php");
                  $_SESSION["logged_in"] = false;
            }
      } else {
            header("Location: ../Pieter/index.php");
      }

      if(session::is_private("dashboard")){
            if(isset($_SESSION["logged_in"])){
                  if($_SESSION["logged_in"] == false){
                        header("Location: ../Pieter/index.php");
                  }
            }
      }
?>

<?php
      include("../includes/footer.php");
?>
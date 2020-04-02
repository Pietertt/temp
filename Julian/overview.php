<?php 
      require("../includes/navbar.php");
      if(session::is_private("overview")){
            if(isset($_SESSION["logged_in"])){
                  if($_SESSION["logged_in"] == false){
                        header("Location: ../Pieter/index.php");
                  }
            }
      }
?>

<div class="row toppad">
    <div class="five wide centered container">
        <div class="ten wide container">
            <h3>Persoonlijke gegevens</h3>
        </div>
    </div>
</div>

<div class="five wide white rounded container">
    <div class="ten wide container">
        <form method="post" action=
            <div class="row">
                <div class="twelve wide column">
                    <label for="name">Naam</label>
                    <?php if(isset($_GET['name'])){
                        $name = $_GET['name'];
                        echo '<input id="name" name="name" type="text" placeholder="Uw naam" value="'.$name.'">';
                    }?>
                </div>

            <div class="twelve wide column">
                <label for="name">Geslacht</label>
                <?php if(isset($_GET['gender'])){
                    $gender = $_GET['gender'];
                    echo '<input id="gender" name="gender" type="text" placeholder="Uw geslacht" value="'.$gender.'">';
                }?>

            </div>

            <div class="twelve wide column">
                <label for="name">Geboortedatum</label>
                <?php if(isset($_GET['birth_date'])){
                    $birth_date = $_GET['birth_date'];
                    echo '<input id="birth_date" name="birth_date" type="text" placeholder="Uw geboortedatum" value="'.$birth_date.'">';
                }?>
            </div>

            <div class="twelve wide column">
                <label for="name">Woonplaats</label>
                <?php if(isset($_GET['residence'])){
                    $residence = $_GET['residence'];
                    echo '<input id="residence" name="residence" type="text" placeholder="Uw woonplaats" value="'.$residence.'">';
                }?>
                        <img id="residence" data-popup='{"title" : "Verander je woonplaats", "inputs" : [{"description" : "Woonplaats", "name" : "residence", "id" : "residence"}], "button" : { "label" : "Verstuur", "id" : "button_change_residence" }}' src="../img/pen.png">
            </div>
        </form>
    </div>
</div>

<div class="row toppad">
    <div class="five wide centered container">
        <div class="ten wide container">
            <h3>Contactgegevens</h3>
        </div>
    </div>
</div>
<div class="five wide white rounded container">
    <div class="ten wide container">
        <form method="post" action=
        <div class="row">

    <div class="twelve wide column">
    <label for="name">Telefoonnummer</label>
    <?php if(isset($_GET['tnumber'])){
        $tnumber = $_GET['tnumber'];
        echo '<input id="tnumber" name="tnumber" type="text" placeholder="Uw telefoonnummer" value="'.$tnumber.'">';
    }?>

                    <img id="phone_number" data-popup='{"title" : "Verander je telefoonnummer", "inputs" : [{"description" : "Telefoonnummer", "name" : "phone_number", "id" : "input_phone_number"}], "button" : { "label" : "Verstuur", "id" : "button_change_phone_number" }}' src="../img/pen.png">

    <div class="twelve wide column">
        <label for="name">Email</label>
        <?php if(isset($_GET['email'])){
            $email = $_GET['email'];
            echo '<input id="email" name="email" type="text" placeholder="Uw email" value="'.$email.'">';
        }?>
                    <img id="email" src="../img/pen.png" data-popup='{"title" : "Verander je e-mailadres", "inputs" : [{"description" : "E-mailadres", "name" : "email_address", "id" : "input_email_adress"}], "button" : {"label" : "Verstuur", "id" : "button_change_email"}}\'>
</div>
    </div>
        </form>
    </div>
</div>

<div class="row toppad">
    <div class="five wide centered container">
        <div class="ten wide container">
            <h3>Hypotheekaanvragen</h3>
        </div>
    </div>
</div>

<div class="twelve wide column">

</div>


<?php require('../includes/footer.php');?>


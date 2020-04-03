<?php
require("../includes/navbar.php");
require("../jmh/mortgagevalidations.php");
?>


<div class="row toppad">
    <div class="five wide centered container">
        <div class="ten wide container">
            <h3>Hypotheek berekenen</h3>
        </div>
    </div>
</div>

<div class="five wide white rounded container">
    <div class="ten wide container">
        <form method="post" action="<?php echo htmlspecialchars("http://localhost/temp/jmh/mortgagevalidations.php");?>">
            <div class="row">
                <div class="twelve wide column">
                    <label for="name">Geboortedatum</label>
                    <?php if(isset($_GET['birthdate'])){
                        $birthdate = $_GET['birthdate'];
                        echo '<input id="birthdate" name="birthdate" type="text" placeholder="dd/mm/jjjj" value="'.$birthdate.'">';
                    }
                    else {
                        echo '<input id="birthdate" name="birthdate" type="text" placeholder="dd/mm/jjjj">';
                    }?>
                </div>
            </div>

            <div class="row">
                <div class="twelve wide column">
                    <label for="email">E-mailadres</label>
                    <?php if(isset($_GET['email'])){
                        $email = $_GET['email'];
                        echo '<input id="email" name="email" type="text" placeholder="Uw email adres" value="'.$email.'">';
                    }
                    else {
                        echo '<input id="email" name="email" type="text" placeholder="Uw email adres">';
                    }?>
                </div>
            </div>

<!--            <div class="row">-->
<!--                <div class="twelve wide column">-->
<!--                    <label for="message">Bericht</label>-->
<!--                    --><?php //if(isset($_GET['message'])){
//                        $message = $_GET['message'];
//                        echo '<textarea id="message" name="message" type="text" placeholder="Typ hier uw bericht.." rows="5" cols="30">'.$message.'</textarea>';
//                    }
//                    else {
//                        echo '<textarea id="message" name="message" type="text" placeholder="Typ hier uw bericht.." rows="5" cols="30"></textarea>';
//                    }?>
<!--                </div>-->
<!--            </div>-->

            <div class="row">
                <div class="twelve wide column">
                    <button id="submit" type="submit" name="submit" value="submit" class="twelve wide blue button">Versturen</button>
                </div>
            </div>
        </form>

        <?php
        if (!isset($_GET['mortgagerequest'])) {
            exit();
        }
        else {
            $mortgageCheck = $_GET['mortgagerequest'];
            $errorboxStart = "<div class='row'><div class='twelve wide column'><p class='error'>";
            $errorboxEnd = "</p></div></div>";

            if ($mortgageCheck == 'empty') {
                echo
                    $errorboxStart . "You did not fill in all the fields" . $errorboxEnd;
                exit();
            } elseif ($mortgageCheck == 'invaliddate') {
                echo
                    $errorboxStart . "The date format is invalid" . $errorboxEnd;
                exit();
            } elseif ($mortgageCheck == 'invalidemail') {
                echo
                    $errorboxStart . "The e-mail you have used is invalid" . $errorboxEnd;
                exit();
            }
        }
        ?>

    </div>
</div>

<?php
require('../includes/footer.php');?>

<?php
require("../includes/navbar.php");
require("../jmh/mortgagevalidations.php");
?>

<?php
$mortgage = $_GET['mortgage'];

?>
<h1>De maximale hypotheek die u kunt krijgen is <?php echo $mortgage ?></h1>


<?php
require('../includes/footer.php');?>

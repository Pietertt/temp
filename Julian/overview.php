<?php require("../includes/navbar.php");

?>

<section
<form action=".." method="">
    <h1><B>Persoonlijke gegevens</B></h1>

    <span>Naam:</span> <?php echo $first_name['first_name'];?>
    <span>Naam:</span> <?php echo $firstname['firstname'];?>

</form>

<form action=".." method="">
    <h1><B>Contact gegevens</B></h1>

    <span>Telefoon:</span> <?php echo $Telephone['Telephone'];?>
    <span>Email:</span> <?php echo $Email['Email'];?>

</form>


</section>
<?php require('../includes/footer.php');?>


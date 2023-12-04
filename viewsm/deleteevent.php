<?php
include "../controller/eventC.php";
$EventC = new eventC();
$EventC->supp_evenement($_GET["id"]);
header('Location:dash.php');
?>
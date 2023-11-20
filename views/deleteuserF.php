<?php
include '../controller/userF.php';
$connexion = new userF();
$connexion->deleteuserF($_GET["iduserF"]);
header('Location:listuserFs.php');

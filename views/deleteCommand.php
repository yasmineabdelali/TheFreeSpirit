<?php
include '../controller/CommandC.php';
$CommandC = new CommandC();
$CommandC->deleteCommand($_GET["id_com"]);
header('Location:listCommands.php');

<?php
include '../controller/CommandC.php';
$CommandC = new CommandC();
$CommandC->deleteCommand($_GET["id_pan"]);
header('Location:listCommands.php');

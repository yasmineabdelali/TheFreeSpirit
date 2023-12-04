<?php

include '../controller/eventC.php';
include '../model/event.php';

// create event
$event = null;

// create an instance of the controller
$eventC = new eventC();
if (
    isset($_POST["nom"]) &&
    isset($_POST["lieu"]) &&
    isset($_POST["date"]) &&
    isset($_POST["duree"])&&
    isset($_POST["prix"])
) {
    if (
        !empty($_POST['nom']) &&
        !empty($_POST["lieu"]) &&
        !empty($_POST["date"]) &&
        !empty($_POST["duree"])&&
        isset($_POST["prix"])
    ) {
        $event = new event(
            null,
            $_POST['nom'],
            $_POST['lieu'],
            $_POST['date'],
            $_POST['duree'],
            $_POST['prix']
        );
        $eventC->ajouterevenement($event);

        $code_postalC= new codepostalC();
        $id=$eventC->derniereidajouté();
        
        $code_postal=new codepostal(null,$id,$_POST["codepostal"]);
        header('Location:dash.php');
    }
}


?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>evenement </title>
    <link rel="stylesheet" href="style_dash.css">
</head>

<body>
    <a href="dash.php">Back to list </a>
    <hr>

    <div class="formulaire" id="formulaire">
        <form action="" method="POST" onsubmit="return verif44()">
            <div class="inputs">
                <h2>Nom</h2>
                <input type="text" name="nom" id="name" >
                <span class="validation-message" id="name-error"></span>

                <h2>Lieu</h2>
                <input type="text" name="lieu" id="lieu" >
                <span class="validation-message" id="lieu-error"></span>

                <h2>Date</h2>
                <input type="date" name="date" id="date" >
                <span class="validation-message" id="date-error"></span>

                <h2>heure debut</h2>
                <input type="text" name="duree" id="duree" >
                <span class="validation-message" id="duree-error"></span>


                <h2>prix</h2>
                <input type="text" name="prix" id="prix" >
                <span class="validation-message" id="prix-error"></span>

                
                <h2>code postal</h2>
                <input type="text" name="codepostal" id="codepostal" >
                <span class="validation-message" id="codepostal-error"></span>

            </div>
            <input type="submit" value="Save">
            <input type="reset" value="Reset">
        </form>
    </div>
    <script src="../public/index.js"></script>
</body>

</html>
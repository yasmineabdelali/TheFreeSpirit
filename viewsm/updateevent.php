<?php
include "../controller/eventC.php";
include "../model/event.php";
$event = null;
$eventC = new eventC();
if (isset($_POST["nom_event"]) && isset($_POST["date_event"]) && isset($_POST["lieu_event"])&&isset($_POST["duree_event"])&&isset($_POST["prix_event"])){
        $nom_event = $_POST["nom_event"];
        $lieu_event = $_POST["lieu_event"];
        $date_event = $_POST["date_event"];
        $duree_event = $_POST["duree_event"];
        $prix_event = $_POST["prix_event"];
        if (!empty($nom_event) &&!empty($date_event) &&!empty($lieu_event)&&!empty($duree_event&&!empty($prix_event))){
            $event = new event(null, $nom_event, $lieu_event, $date_event, $duree_event, $prix_event);
            var_dump($event);
            $eventC->majevenement($event, $_GET['id']);
            header('Location:dash.php');
    }
}
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event update</title>
    <link rel="stylesheet" href="style_dash.css">
</head>

<body>
    <button><a href="dash.php">Afficher evenement</a></button>
    <hr>

    <?php
    if (isset($_GET['id'])) {
        $oldEvent = $eventC->afficher_evenement($_GET['id']);
        
    ?>
    <form action="" method="POST" onsubmit="return verif44()">
        <table>
        <tr>
            <td><label for="idEvent">Id d'evenement :</label></td>
            <td>
                <input type="text" id="idEvent" name="id" value="<?php echo $_GET['id'] ?>" readonly/>
            </td>
            </tr>


            <tr>
                <td><label for="nom_event">Nom d'evenement :</label></td>
                <td>
                    <input type="text" id="name" name="nom_event" value="<?php echo $oldEvent['nom']?>"/>
                </td>
            </tr>


            <tr>
                <td><label for="lieu_event">lieu d'evenement :</label></td>
                <td>
                    <input type="text" id="lieu" name="lieu_event" value="<?php echo $oldEvent['lieu']?>"/>
                </td>
            </tr>


            <tr>
                <td><label for="date_event">Date d'evenement :</label></td>
                <td>
                    <input type="date" id="date" name="date_event" value="<?php echo $oldEvent['datee']?>"/>
                </td>
            </tr>

            
            <tr>
                <td><label for="duree_event">Heure du debut d'evenement :</label></td>
                <td>
                    <input type="text" id="duree" name="duree_event" value="<?php echo $oldEvent['duree']?>"/>
                </td>
            </tr>
            <tr>
                <td><label for="prix_event">prix d'evenement :</label></td>
                <td>
                    <input type="text" id="prix" name="prix_event" value="<?php echo $oldEvent['prix']?>"/>
                </td>
            </tr>

            <td>
                <input type="submit" value="Save">
            </td>
            <td>
                <input type="reset" value="Reset">
            </td>
        </table>

    </form>
    <?php
    }
    ?>
    <script src="../public/index.js"></script>
</body>

</html>
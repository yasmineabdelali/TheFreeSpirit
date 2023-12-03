<?php
include "../controller/CommandC.php";
include "../model/Command.php";
$Command = null;
$CommandC = new CommandC();
if (isset($_POST["nom_command"]) && isset($_POST["adresse_command"]) && isset($_POST["produit_command"])&& isset($_POST["tel_command"])){
        $nom_command = $_POST["nom_command"];
        $adresse_command = $_POST["adresse_command"];
        $produit_command  = $_POST["produit_command"];
        $tel_command = $_POST["tel_command"];
        if (!empty($nom_command) &&!empty($adresse_command) &&!empty($produit_command)&&!empty($tel_command)){
            $Command = new Command(null, $nom_command, $adresse_command, $produit_command, $tel_command);
            var_dump($Command);
            $CommandC->updateCommand($Command, $_GET['id_com']);
            header('Location:listCommands.php');
    }
}
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Command update</title>
</head>

<body>
    <button><a href="dash.php">Afficher Command</a></button>
    <hr>

    <?php
    if (isset($_GET['id_com'])) {
        $oldCommand = $CommandC->showCommand($_GET['id_com']);
        
    ?>
    <form action="" method="POST">
        <table>
        <tr>
            <td><label for="id_command">Id Command :</label></td>
            <td>
                <input type="text" id="id_command" name="id_command" value="<?php echo $_GET['id_com'] ?>" readonly/>
            </td>
            </tr>


            <tr>
                <td><label for="nom_command">Nom d'command :</label></td>
                <td>
                    <input type="text" id="nom_command" name="nom_command" value="<?php echo $oldCommand['nom']?>"/>
                </td>
            </tr>


            <tr>
                <td><label for="adresse_command">adresse command :</label></td>
                <td>
                    <input type="text" id="adresse_command" name="adresse_command" value="<?php echo $oldCommand['adresse']?>"/>
                </td>
            </tr>


            <tr>
                <td><label for="produit_command">Produit command: :</label></td>
                <td>
                    <input type="text" id="produit_command" name="produit_command" value="<?php echo $oldCommand['produit']?>"/>
                </td>
            </tr>

            
            <tr>
                <td><label for="tel_command">numéro command :</label></td>
                <td>
                    <input type="text" id="tel_command" name="tel_command" value="<?php echo $oldCommand['tel']?>"/>
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
</body>

</html>
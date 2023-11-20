<?php

include '../controller/userF.php';
include '../model/userF.php';

// create client
$connexion = null;
// create an instance of the controller
$connexion = new userF();


if (
    isset($_POST["nom"]) &&
    isset($_POST["prenom"]) &&
    isset($_POST["email"]) &&
    isset($_POST["tel"])
    ) {
        if (
        !empty($_POST['nom']) &&
        !empty($_POST["prenom"]) &&
        !empty($_POST["email"]) &&
        !empty($_POST["tel"])
    ) {
        /* foreach ($_POST as $key => $value) {
            echo "Key: $key, Value: $value<br>";
        } */
        $connexion = new userF(
            null,
            $_POST['nom'],
            $_POST['prenom'],
            $_POST['email'],
            $_POST['tel']
        );
        var_dump($connexion);
        
        $connexion->updateuserF($connexion, $_GET['iduserF']);

        header('Location:listuserFs.php');
    }
}



?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Display</title>
</head>

<body>
    <button><a href="listuserFs.php">Back to list</a></button>
    <hr>

    <?php
    if (isset($_GET['iduserF'])) {
        $olduserF = $connexion->showuserF($_GET['iduserF']);
        
    ?>

        <form action="" method="POST">
            <table>
            <tr>
                    <td><label for="nom">IduserF :</label></td>
                    <td>
                        <input type="text" id="iduserF" name="iduserF" value="<?php echo $_GET['iduserF'] ?>" readonly />
                    </td>
                </tr>
                <tr>
                    <td><label for="nom">Nom :</label></td>
                    <td>
                        <input type="text" id="nom" name="nom" value="<?php echo $olduserF['nom'] ?>" />
                    </td>
                </tr>
                <tr>
                    <td><label for="prenom">Prénom :</label></td>
                    <td>
                        <input type="text" id="prenom" name="prenom" value="<?php echo $olduserF['prenom'] ?>" />
                    </td>
                </tr>
                <tr>
                    <td><label for="email">Email :</label></td>
                    <td>
                        <input type="text" id="email" name="email" value="<?php echo $olduserF['email'] ?>" />
                    </td>
                </tr>
                <tr>
                    <td><label for="telephone">Téléphone :</label></td>
                    <td>
                        <input type="text" id="telephone" name="tel" value="<?php echo $olduserF['tel'] ?>" />
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
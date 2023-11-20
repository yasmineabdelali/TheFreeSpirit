<?php

include '../controller/userF.php';
include '../model/user.php';

// create client
$connexion = null;

// create an instance of the controller
$connexion = new userF();
if (
    isset($_POST["nom"]) &&
    isset($_POST["prenom"]) &&
    isset($_POST["email"]) &&
    isset($_POST["tel"])&&
    isset($_POST["role"])
) {
    if (
        !empty($_POST['nom']) &&
        !empty($_POST["prenom"]) &&
        !empty($_POST["email"]) &&
        !empty($_POST["tel"])&&
        !empty($_POST["role"])
    ) {
        $user = new user(
            null,
            $_POST['nom'],
            $_POST['prenom'],
            $_POST['email'],
            $_POST['tel'],
            $_POST['role']
        );
        $connexion->adduserF($user);
        header('Location:listuserF.php');
    }
}


?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>connexion</title>
</head>

<body>
    <a href="listuserF.php">Back to list </a>
    <hr>

    <form action="adduserF.php" method="POST">
        <table>
            <tr>
                <td><label for="nom">Nom :</label></td>
                <td>
                    <input type="text" id="nom" name="nom" />
                </td>
            </tr>
            <tr>
                <td><label for="prenom">Prénom :</label></td>
                <td>
                    <input type="text" id="prenom" name="prenom" />
                </td>
            </tr>
            <tr>
                <td><label for="email">Email :</label></td>
                <td>
                    <input type="text" id="email" name="email" />
                </td>
            </tr>
            <tr>
                <td><label for="telephone">Téléphone :</label></td>
                <td>
                    <input type="text" id="telephone" name="tel" />
                </td>
            </tr>
            <tr>
                <td><label for="role">Rôle:</label></td>
                    <td><select id="role" name="role" required>
                        <option value="client">Client</option>
                        <option value="artiste">Artiste</option>
                        <option value="admin">Admin</option>
                    </select></td>
            </tr>

            <td>
                <input type="submit" value="Save">
            </td>
            <td>
                <input type="reset" value="Reset">
            </td>
        </table>

    </form>
</body>

</html>
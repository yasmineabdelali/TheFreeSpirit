<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include '../controller/produitC.php';
include '../model/produit.php';

// create client
$produit = null;

// create an instance of the controller
$produitC = new produitC();

if (isset($_POST["nom"]) && isset($_POST["prix"])) {
    if (!empty($_POST['nom']) && !empty($_POST["prix"])) {
        $produit = new produit( null,$_POST['nom'], $_POST['prix']);
        $produitC->addproduit($produit);
        header('Location: listproduits.php');
        exit(); // Ensure that no code is executed after the header
    } else {
        echo "Please fill out all the fields.";
    }
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>produit </title>
</head>
<body>
    <a href="listproduits.php">Back to list </a>
    <hr>

    <form action="addproduit.php" method="POST">
        <table>
            <tr>
                <td><label for="nom">Nom :</label></td>
                <td>
                    <input type="text" id="nom" name="nom" />
                </td>
            </tr>
            <tr>
                <td><label for="prix">prix :</label></td>
                <td>
                    <input type="text" id="prix" name="prix" />
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
    <script>


    </script>
</body>
</html>
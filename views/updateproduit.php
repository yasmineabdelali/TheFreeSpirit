<?php

include '../controller/produitC.php';
include '../model/produit.php';

// create client
$produit = null;
// create an instance of the controller
$produitC = new produitC();


if (
    isset($_POST["nom"]) &&
    isset($_POST["prix"]) 
   
    ) {
        if (!empty($_POST['nom']) && !empty($_POST["prix"]) 
       
    ) {
        $produit = new produit(
            null,
            $_POST['nom'],
            $_POST['prix'],
        );
        var_dump($produit);
        $produitC->updateproduit($joueur, $_GET['idproduit']);
        header('Location:listproduits.php');
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
    <button><a href="listproduits.php">Back to list</a></button>
    <hr>

    <?php
    if (isset($_GET['idproduit'])) {
        $oldproduit = $produitC->listproduits($_GET['id']);
        
    ?>

        <form action="" method="POST">
            <table>
            <tr>
                    <td><label for="idproduit">Idproduit :</label></td>
                    <td>
                        <input type="text" id="idproduit" name="idproduit" value="<?php echo $_GET['id'] ?>" readonly />
                    </td>
                </tr>
                <tr>
                    <td><label for="nom">Nom :</label></td>
                    <td>
                        <input type="text" id="nom" name="nom" value="<?php echo $oldproduit['nom'] ?>" />
                    </td>
                </tr>
                <tr>
                    <td><label for="prix">Prénom :</label></td>
                    <td>
                        <input type="text" id="prix" name="prix" value="<?php echo $oldproduit['prix'] ?>" />
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
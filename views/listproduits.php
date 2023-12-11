<?php
include "../controller/produitC.php";

$c = new produitC();
$tab = $c->tab_produit();

?>

<center>
    <h1>List of produit</h1>
    <h2>
        <a href="addproduit.php">Add product</a>
    </h2>
</center>
<table border="1" align="center" width="70%">
    <tr>
        <th>Id produit</th>
        <th>Nom</th>
        <th>Prix</th>

        <th>Update</th>
        <th>Delete</th>
    </tr>


    <?php
    foreach ($tab as $produit) {
    ?>
        <tr>
            <td><?= $produit['id']; ?></td>
            <td><?= $produit['nom']; ?></td>
            <td><?= $produit['prix']; ?></td>

            <td align="center">
            <a href="updateproduit.php?id=<?php echo $produit['id']; ?>">Update</a>
            </td>
            
            <td>
                <a href="deleteproduit.php?id=<?php echo $produit['id']; ?>">Delete</a>
            </td>
        </tr>
    <?php
    }
    ?>
</table>
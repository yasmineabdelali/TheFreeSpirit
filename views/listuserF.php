<?php
include "../controller/userF.php";

$c = new userF();
$tab = $c->listuserF();
?>

<center>
    <h1>List Of Users</h1>
    <h2>
        <a href="adduserF.php">Add USER</a>
    </h2>
</center>
<table border="1" align="center" width="70%">
    <tr>
        <th>Id userF</th>
        <th>Nom</th>
        <th>Prenom</th>
        <th>Email</th>
        <th>Tel</th>
        <th>role</th>
        <th>Update</th>
        <th>Delete</th>
    </tr>


    <?php
    foreach ($tab as $connexion) {
    ?>
        <tr>
            <td><?= $connexion['iduserF']; ?></td>
            <td><?= $connexion['nom']; ?></td>
            <td><?= $connexion['prenom']; ?></td>
            <td><?= $connexion['email']; ?></td>
            <td><?= $connexion['tel']; ?></td>
            <td><?= $connexion['role']; ?></td>
            <td>
                <a href="updateuserF.php?iduserF=<?php echo $connexion['iduserF']; ?>">Update1</a>
            </td>
            <td align="center">
                <form method="POST" action="updateuserF.php">
                    <input type="submit" name="update" value="Update">
                    <input type="hidden" value=<?PHP echo $connexion['iduserF']; ?> name="iduserF">
                </form>
            </td>
            <td>
                <a href="deleteuserF.php?iduserF=<?php echo $connexion['iduserF']; ?>">Delete</a>
            </td>
        </tr>
    <?php
    }
    ?>
</table>
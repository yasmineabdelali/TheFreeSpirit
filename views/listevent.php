<?php
include "../controller/eventC.php";
$c = new eventC();
$tab = $c->tab_event();
?>
<center>
    <h1>Listes des evenements</h1>
    <h2>
        <a href="addevent.php">Ajouter evenement</a>
    </h2>
</center>
<table border="1" align="center" width="70%">
    <tr>
        <th>Id d'evenement</th>
        <th>Nom d'evenement</th>
        <th>Lieu d'evenement</th>
        <th>Date d'evenement</th>
        <th>Heure du debut d'evenement</th>
        <th>prix d'entré</th>
        <th>Update</th>
        <th>Delete</th>
    </tr>
    <?php
    foreach ($tab as $event) {
    ?>
    <tr>
        <td><?= $event['id'];   ?></td>
        <td><?= $event['nom'];  ?></td>
        <td><?= $event['lieu']; ?></td>
        <td><?= $event['datee']; ?></td>
        <td><?= $event['duree']; ?></td>
        <td><?= $event['prix']; ?></td>
        <td align="center">
            <a href="updateevent.php?id=<?php echo $event['id'];?>">Update</a>
        </td>
        <td><a href="deleteevent.php?id=<?php echo $event['id'];?>">Delete</a></td>
    </tr>
    <?php
    }
    ?>
</table>
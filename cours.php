<!DOCTYPE html>
<html>
<head>
    <title>Cour Details</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Cour Details</h1>

    <?php
    include '../Controller/courC.php';
    $courC = new courC();
    $liste = $courC->afficherCour();
    ?>

    <table class="table table-hover">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Description</th>
                <th>Niveau</th>
                <th>Enseignant</th>
                <th>Salle</th>
                <th>Date de début</th>
                <th>Date de fin</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($liste as $cour) { ?>
                <tr>
                    <td><?php echo $cour['nom']; ?></td>
                    <td><?php echo $cour['description']; ?></td>
                    <td><?php echo $cour['niveau']; ?></td>
                    <td><?php echo $cour['enseignat']; ?></td>
                    <td><?php echo $cour['salle']; ?></td>
                    <td><?php echo $cour['datedeb']; ?></td>
                    <td><?php echo $cour['datefin']; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>
<?php

include '../controller/CommandC.php';
include '../model/Command.php';

// create client
$Command = null;

// create an instance of the controller
$CommandC = new CommandC();
if (
    isset($_POST["nom"]) &&
    isset($_POST["adresse"]) &&
    isset($_POST["produit"])&&
    isset($_POST["tel"])
) {
    if (
        !empty($_POST["nom"]) &&
        !empty($_POST["adresse"]) &&
        !empty($_POST["produit"]) &&
        !empty($_POST["tel"])
    ) {
        $Command = new Command(
            null,
            $_POST['nom'],
            $_POST['adresse'],
            $_POST['produit'],
            $_POST['tel']
        );
        $CommandC->addCommand($Command);
        header('Location:listCommands.php');
    }
}


?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Command</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        a {
            text-decoration: none;
            color: #333;
        }

        header {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 10px;
        }

        hr {
            border: 1px solid #ddd;
        }

        form {
            max-width: 400px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
        }

        table tr {
            margin-bottom: 10px;
        }

        table td {
            padding: 8px;
        }

        input[type="text"] {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            margin-bottom: 10px;
        }

        input[type="submit"],
        input[type="reset"] {
            background-color: #333;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        input[type="submit"]:hover,
        input[type="reset"]:hover {
            background-color: #555;
        }

        a {
            display: inline-block;
            margin-top: 10px;
            color: #333;
            text-decoration: none;
            background-color: #eee;
            padding: 5px 10px;
            border-radius: 3px;
        }
    </style>
</head>

<body>
    <header>
        <h1>Command</h1>
    </header>

    <a href="listCommands.php">Back to list</a>
    <hr>

    <form action="" method="POST">
        <table>
            <tr>
                <td><label for="nom">Nom :</label></td>
                <td>
                    <input type="text" id="nom" name="nom" />
                </td>
            </tr>

            <tr>
                <td><label for="adresse">Adresse :</label></td>
                <td>
                    <input type="text" id="adresse" name="adresse" />
                </td>
            </tr>
            <tr>
                <td><label for="produit">Produit :</label></td>
                <td>
                    <input type="text" id="produit" name="produit" />
                </td>
            </tr>
            <tr>
                <td><label for="tel">Telephone :</label></td>
                <td>
                    <input type="text" id="tel" name="tel" />
                </td>
            </tr>

            <tr>
                <td>
                    <input type="submit" value="Save">
                </td>
                <td>
                    <input type="reset" value="Reset">
                </td>
            </tr>
        </table>
    </form>
</body>

</html>

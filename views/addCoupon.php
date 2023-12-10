<?php

include '../controller/CouponC.php';
include '../model/Coupon.php';

// create client
$Coupon = null;

// create an instance of the controller
$CouponC = new CouponC();
if (
    isset($_POST["id_com"]) &&
    isset($_POST["code_coup"])
) 

{
    if (
        !empty($_POST["id_com"])&&
        !empty($_POST["code_coup"]) 

    ) {
        $Coupon = new Coupon(
            null,
            $_POST['id_com'],
            $_POST['code_coup']

        );
        $CouponC->addCoupon($Coupon);
        header('Location:listCoupons.php');
    }
}


?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coupon</title>
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
        <h1>Coupon</h1>
    </header>

    <a href="listCoupons.php">Back to list</a>
    <a href="listCommands.php">Back to your Command</a>
    <hr>

    <form action="" method="POST">
        <table>
        <tr>
                <td><label for="id_com">id de command :</label></td>
                <td>
                    <input type="text" id="id_com" name="id_com" />
                </td>
            </tr>

            <tr>
                <td><label for="code_coup">Code coupon :</label></td>
                <td>
                    <input type="text" id="code_coup" name="code_coup" />
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

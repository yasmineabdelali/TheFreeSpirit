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
</html>


<?php
include "../controller/CouponC.php";

$c = new CouponC();
$tab = $c->listCoupons();

?>

<center>
    <h1>List of Coupons</h1>
    <h2>
        <a href="addCoupon.php">Add Coupon</a>
    </h2>
</center>
<table border="1" align="center" width="70%">
    <tr>
        <th>ID_coup</th>
        <th>ID_com</th>
        <th>Code_coup</th>
        <th>Update</th>
        <th>Delete</th>
    </tr>


    <?php
    foreach ($tab as $coupon) {
    ?>
        <tr>
            <td><?= $coupon['id_coup']; ?></td>
            <td><?= $coupon['id_com']; ?></td>
            <td><?= $coupon['code_coup']; ?></td>
            <td align="center">
                <a href="updateCoupon.php?id_coup=<?php echo $coupon['id_coup']; ?>">Update1</a>
            </td>
            <td>
                <a href="deleteCoupon.php?id_coup=<?php echo $coupon['id_coup']; ?>">Delete</a>
            </td>
        </tr>
    <?php
    }
    ?>
</table>
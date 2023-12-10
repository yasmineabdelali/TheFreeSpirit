<?php
include "../controller/CouponC.php";  // Update the path to the Coupon controller
include "../model/Coupon.php";        // Update the path to the Coupon model

$coupon = null;
$couponC = new CouponC();  // Update to the Coupon controller

if (isset($_POST["id_com"]) && isset($_POST["code_coup"])) {
    $id_com = $_POST["id_com"];
    $code_coup = $_POST["code_coup"];

    if (!empty($id_com) && !empty($code_coup)) {
        $coupon = new Coupon($id_com, $code_coup);
        var_dump($coupon);
        $couponC->updateCoupon($coupon, $_GET['id_coup']);  // Update to the appropriate method in the Coupon controller
        header('Location:listCoupons.php');  // Update to the appropriate page
    }
}
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coupon update</title>
</head>

<body>
    <button><a href="dash.php">Afficher Coupon</a></button>
    <hr>

    <?php
    if (isset($_GET['id_coup'])) {
        $oldCoupon = $couponC->showCoupon($_GET['id_coup']);  // Update to the appropriate method in the Coupon controller
    ?>
    <form action="" method="POST">
        <table>
            <tr>
                <td><label for="id_com">id de Command:</label></td>
                <td>
                    <input type="text" id="id_com" name="id_com" value="<?php echo $oldCoupon['id_com'] ?>" />
                </td>
            </tr>

            <tr>
                <td><label for="code_coup">Coupon Code:</label></td>
                <td>
                    <input type="text" id="code_coup" name="code_coup">
    </td>    
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
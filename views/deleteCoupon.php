<?php
include '../controller/CouponC.php';  // Update the path to the Coupon controller
$couponC = new CouponC();  // Update to the Coupon controller
$couponC->deleteCoupon($_GET["id_coup"]);  // Update to the appropriate method in the Coupon controller
header('Location: listCoupons.php');  // Update to the appropriate page

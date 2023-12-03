<?php
include "C:/xamppp/htdocs/phpCRUDHANI/controller/CommandC.php";

$c = new CommandC();
$tab = $c->listCommands();
?>

<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Educal – Online Learning and Education HTML5 Template</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
    <link rel="stylesheet" href="assets/css/preloader.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/meanmenu.css">
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/swiper-bundle.css">
    <link rel="stylesheet" href="assets/css/backToTop.css">
    <link rel="stylesheet" href="assets/css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="assets/css/fontAwesome5Pro.css">
    <link rel="stylesheet" href="assets/css/elegantFont.css">
    <link rel="stylesheet" href="assets/css/default.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

    <!-- pre loader area start -->
    <div id="loading">
        <!-- ... (existing preloader code) ... -->
    </div>
    <!-- pre loader area end -->

    <!-- back to top start -->
    <div class="progress-wrap">
        <!-- ... (existing back to top code) ... -->
    </div>
    <!-- back to top end -->

    <!-- header area start -->
    <!-- ... (existing header code) ... -->
    <!-- header area end -->

    <!-- cart mini area start -->
    <!-- ... (existing cart mini code) ... -->
    <!-- cart mini area end -->

    <!-- sidebar area start -->
    <!-- ... (existing sidebar code) ... -->
    <!-- sidebar area end -->
    <div class="body-overlay"></div>

    <main>
        <!-- Table of Commands -->
        <section class="cart-area pt-100 pb-100">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="table-content table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="product-thumbnail">Id_com</th>
                                        <th class="cart-product-name">Nom</th>
                                        <th class="product-price">Adresse</th>
                                        <th class="product-quantity">Produit</th>
                                        <th class="product-subtotal">Tel</th>
                                        <th class="product-remove">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($tab as $Command) : ?>
                                        <tr>
                                            <td class="product-thumbnail"><?= $Command['id_com']; ?></td>
                                            <td class="product-name"><?= $Command['nom']; ?></td>
                                            <td class="product-price"><?= $Command['adresse']; ?></td>
                                            <td class="product-quantity"><?= $Command['produit']; ?></td>
                                            <td class="product-subtotal"><?= $Command['tel']; ?></td>
                                            <td class="product-remove">
                                                <a href="updateCommand.php?id_com=<?= $Command['id_com']; ?>">Update</a>
                                                <a href="deleteCommand.php?id_com=<?= $Command['id_com']; ?>">Delete</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- footer area start -->
    <!-- ... (existing footer code) ... -->
    <!-- footer area end -->

    <script src="assets/js/vendor/jquery-3.5.1.min.js"></script>
    <script src="assets/js/vendor/waypoints.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/jquery.meanmenu.js"></script>
    <script src="assets/js/swiper-bundle.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/jquery.fancybox.min.js"></script>
    <script src="assets/js/isotope.pkgd.min.js"></script>
    <script src="assets/js/parallax.min.js"></script>
    <script src="assets/js/backToTop.js"></script>
    <script src="assets/js/purecounter.js"></script>
    <script src="assets/js/ajax-form.js"></script>
    <script src="assets/js/wow.min.js"></script>
    <script src="assets/js/imagesloaded.pkgd.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>

</html>

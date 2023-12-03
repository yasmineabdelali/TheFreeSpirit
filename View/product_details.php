<?php
    session_start();
    include_once('../connection.php');
    if (isset($_GET['product_id'])) {
        $product_id = $_GET['product_id'];
        $sql = "SELECT products.*, categories.name AS category_name FROM products LEFT JOIN categories ON products.category_id = categories.id WHERE products.id = $product_id";
        $result = $conn->query($sql);
        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
        } else {
            header('Location: error_page.php');
            exit();
        }
    } else {
        header('Location: error_page.php');
        exit();
    }
?>
<div class="wrapper">
    <div class="product-single">
        <div class="product-gallery">
            <div id="slider-wrap">
                <ul class="slides">
                <li><img src='<?php echo "../" . $row['image']; ?>' alt="" /></li>
                </ul>

            </div>
        </div>
        <div class="product-details">
            <h1 class="product-title">
                <p>Product Tile: <?php echo $row['name']; ?></p>
            </h1>
            <h3 class="product-cost">Price: $<?php echo $row['price']; ?></h3>
            <div class="product-description">
                <p><?php echo $row['description']; ?></p>
            </div>
            <div class="product-description">
                <p>Category : <?php echo $row['category_name']; ?></p>
            </div>
            <div class="product-cta">
                <button class="product-atc">Add to Cart</button>
                <button class="product-atw">Add to Wishlist</button>
                <br>
                <a href="produit.php" class="btn btn-primary">Go back to home page</a>
            </div>
        </div>
    </div>
</div>
<link href="product_details.css" rel="stylesheet" type="text/css" />
<?php
    session_start();
    include_once('../connection.php');
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $categoryFilter = $_POST['category_filter'];
        $sql = "SELECT products.*, categories.name AS category_name FROM products LEFT JOIN categories ON products.category_id = categories.id";

        if (!empty($categoryFilter)) {
            $sql .= " WHERE categories.id = '$categoryFilter'";
        }
        $query = $conn->query($sql);
    } else {
        $sql = "SELECT products.*, categories.name AS category_name FROM products LEFT JOIN categories ON products.category_id = categories.id";
        $query = $conn->query($sql);
    }
?>
<html>

<head>
    <meta charset="utf-8" />
    <meta content="IE-edge" http-equiv="X-UA-Compatible" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Shopping Site</title>
    <!--web-icon------------------->
    <link href="images/logo.png" rel="shortcut icon" />
    <link rel="stylesheet" href="styles.css">
    <!--stylesheet-------------------->
    <link href="styles.css" rel="stylesheet" type="text/css" />
    <!--FontAwesome-------->
    <script crossorigin="anonymous" src="https://kit.fontawesome.com/70a642cd7c.js"></script>
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="datatable/dataTable.bootstrap.min.css">
    <style>
        button[type="reset"] {
            background-color: #f44336; 
            color: white;
            padding: 10px 15px;
            border: none; 
            border-radius: 4px; 
            cursor: pointer; 
            margin-left: 10px; 
        }
        button[type="submit"] {
            background-color: #4CAF50; 
            color: white;
            padding: 10px 15px; 
            border: none; 
            border-radius: 4px; 
            cursor: pointer; 
        }
    </style>
</head>

<body>
    <!--main-section--------------->
    <section class="main">
        <!--logo------------->
        <div class="logo">
            <a href="#">
                <font>LO</font>GO
            </a>
        </div>
        <!--text------------>
        <div class="m-text">
            <h1>Ou<font>r</font>
            </h1>
            <h2>Produc<font>ts</font>
            </h2>
        </div>
        <!--social-------->
        <div class="social">
            <a href="#"><i class="fab fa-facebook-f"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
            <a href="#"><i class="fab fa-youtube"></i></a>
        </div>
    </section>

    <section class="product">
        <div class="p-heading">
            <h3>List <br>
                <font>Of</font><br>Products
            </h3>
        </div>
        <!-- Filter form -->
        <form method="post">
            <label for="category_filter">Filter by Category:</label>
            <select name="category_filter" id="category_filter" class="form-control">
                <option value="">Select Category</option>
                <?php
            $categoriesSql = "SELECT * FROM categories";
            $categoriesResult = $conn->query($categoriesSql);
            while ($category = $categoriesResult->fetch_assoc()) {
                echo "<option value='" . $category['id'] . "'>" . $category['name'] . "</option>";
            }
        ?>
            </select>
            <button type="submit" class="btn btn-success">Apply Filter</button>
            <button type="reset" class="reset"  onclick="resetFilter()">Reset Filter</button>
        </form>

        <!-- Product listing -->
        <div class="product-container">
            <?php
                while ($row = $query->fetch_assoc()) {
                    echo "
                    <div class='p-box'>
                        <img src='../" . $row['image'] . "' alt='Product Image'>
                        <h5>" . $row['name'] . "</h5>
                        <p>Category : " . $row['category_name'] . "</p>
                        <p>" . $row['description'] . "</p>
                        <a class='price' href='#'>$" . $row['price'] . "</a>
                        <a class='buy-btn' href='product_details.php?product_id=" . $row['id'] . "'>Show product details</a>
                    </div>";
                    
                }
            ?>
        </div>
    </section>

    <!--subscribe------------------------->
    <section class="subcribe-container">
        <!--heading-->
        <h3>Subscribe For New Product Notification</h3>
        <!--Input-------->
        <div class="subscribe-input">
            <input placeholder="Example@gmail.com" type="email" />
            <a class="subscribe-btn" href="#">Send</a>
        </div>
    </section>

    <!--copyright--------------->
    <a class="copyright" href="#">&#169; Copyright 2020. Shop Site By Going To Internet</a>

    <!-- Include Bootstrap and jQuery scripts -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
    function resetFilter() {
        document.getElementById("category_filter").value = "";
        document.forms[0].submit();
    }
    </script>
    <?php include('View/add_modal.php') ?>
</body>

</html>
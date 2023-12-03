<?php
// Include your necessary PHP files and handle any server-side operations here
include '../controller/CommandC.php';
include '../model/Command.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Basket</title>
    <style>
        /* Add your CSS styles here */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .product {
            border: 1px solid #ddd;
            padding: 10px;
            margin: 10px;
            text-align: center;
        }
        #basket {
            border: 1px solid #333;
            padding: 10px;
            margin: 10px;
        }
    </style>
</head>
<body>
    <div class="product" id="product1">
        <h2>Product 1</h2>
        <p>Price: $20</p>
        <button onclick="addToBasket('Product 1', 20)">Add to Basket</button>
    </div>

    <div class="product" id="product2">
        <h2>Product 2</h2>
        <p>Price: $30</p>
        <button onclick="addToBasket('Product 2', 30)">Add to Basket</button>
    </div>

    <div id="basket">
        <h2>Shopping Basket</h2>
        <ul id="basket-items"></ul>
        <p>Total: $<span id="total">0</span></p>
        <button onclick="submitBasket()">Submit Basket</button>
    </div>
    <a href="addCommand.php">Add Command</a>   
    <script>
        // Add your JavaScript code here
        let basketItems = [];
        let total = 0;

        function addToBasket(productName, price) {
            basketItems.push({ productName, price });
            total += price;

            updateBasket();
        }

        function updateBasket() {
            const basketItemsList = document.getElementById('basket-items');
            const totalElement = document.getElementById('total');

            // Clear previous items
            basketItemsList.innerHTML = '';

            // Update basket items
            basketItems.forEach(item => {
                const listItem = document.createElement('li');
                listItem.textContent = `${item.productName} - $${item.price}`;
                basketItemsList.appendChild(listItem);
            });

            // Update total
            totalElement.textContent = total;
        }

        function submitBasket() {
            // Use AJAX to send basketItems to the server
            const xhr = new XMLHttpRequest();
            xhr.open('POST', 'submitBasket.php', true);
            xhr.setRequestHeader('Content-Type', 'application/json');

            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    // Handle the server's response if needed
                    console.log(xhr.responseText);
                }
            };

            const data = JSON.stringify({ basketItems, total });
            xhr.send(data);
        }
    </script>
</body>
</html>

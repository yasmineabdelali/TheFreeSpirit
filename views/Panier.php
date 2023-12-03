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
    </div>
    <a href="listCommands.php">Back to list</a>   
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
    </script>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/styles/template/Navbar.css">
    <link rel="stylesheet" href="../../public/styles/product/product.css"> <!-- Add a separate CSS file for product styles -->
    <title><?php echo $this->data['name']; ?></title>
</head>
<body>
    <?php
    $current_page = "Product";
    include(dirname(__DIR__) . '/template/Navbar.php');
    ?>

    <div class="product-container">
        <div class="product-image">
            <img src="https://vnn-imgs-a1.vgcloud.vn/toquoc.mediacdn.vn/280518851207290880/2022/9/25/iphone-15-ultra-7-16640892704142065627851.jpg" alt="Product Image">
        </div>
        <div class="product-details">
            <h2><?php echo $this->data['name']; ?></h2>
            <h4>Rp <?php echo $this->data['price']; ?></h4>
            <p><?php echo $this->data['description']; ?></p>

            <div class="product-actions">
                <h3>Quantity</h3>
                <input type="number" id="quantity" min="1" value="1">
                <p class="stock-info">Stock: <?php echo $this->data['stock']; ?></p>
                <button class="add-to-cart-btn">Add to Cart</button>
            </div>
        </div>
    </div>
</body>
</html>

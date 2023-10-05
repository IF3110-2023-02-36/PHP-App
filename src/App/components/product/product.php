<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/styles/template/Navbar.css">
    <link rel="stylesheet" href="../../public/styles/product/product.css"> <!-- Add a separate CSS file for product styles -->
    <title><?php echo $this->data['product']['name']; ?></title>
</head>
<body>
    <?php
    $current_page = "Product";
    include(dirname(__DIR__) . '/template/Navbar.php');
    ?>

    <div class="product-container">
        <div class="product-image">
            <img src= <?php echo "../../public/storage/image/". $this->data['productFile']['file_name'] ?> alt="Product Image">
        </div>
        <div class="product-details">
            <h2><?php echo $this->data['product']['name']; ?></h2>
            <h4>Rp <?php echo $this->data['product']['price']; ?></h4>
            <p><?php echo $this->data['product']['description']; ?></p>

            <form class="product-actions" action="/addCart/<?= $this->data['product']['id'] ?>" method="POST" enctype="multipart/form-data">
                <h3>Quantity</h3>
                <input type="number" name="quantity" id="quantity" min="1" max="<?= $this->data['product']['stock'] ?>"value="1">
                <p class="stock-info">Stock: <?php echo $this->data['product']['stock']; ?></p>
                <button type="submit" class="add-to-cart-btn">Add to Cart</button>
            </form>
        </div>
    </div>
</body>
</html>

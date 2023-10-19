<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../styles/product/Product.css">
    <link rel="stylesheet" href="../../styles/Global.css">
    <title><?php echo $this->data['product']['name']; ?></title>
</head>
<body>
    <?php
    include(dirname(__DIR__) . '/template/Navbar.php');
    ?>

    <div class="product-container">
        <div class="product-image">
            <img src= <?php echo "../../storage/image/". $this->data['productFile'][0][2] ?> alt="Product Image">
            <?php 
                if(sizeof($this->data['productFile']) > 1){
                    $src = '../../storage/video/'.$this->data['productFile'][1][2];
                    echo "
                    <video controls>
                    <source src=$src type='video/mp4'>
                    </video>";
                }
            ?>
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

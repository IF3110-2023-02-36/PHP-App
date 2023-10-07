<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/styles/template/Navbar.css">
    <link rel="stylesheet" href="../../public/styles/cart/cart.css"> <!-- Add a separate CSS file for cart styles -->
    <title>Shopping Cart</title>
    <script src="../../public/scripts/Cart/cart.js"></script>
</head>

<body>
    <?php
    include(dirname(__DIR__) . '/template/Navbar.php');
    ?>

    <div class="cart-container">
        <h2>Your Shopping Cart</h2>
            <?php 
            if (empty($this->data["cart"])) {
                echo "<p>Your cart is empty.</p>";
            } else {
                $cartTable = "";
                foreach ($this->data["cart"] as $item) {
                    $itemDetail = $this->data['cartItems'][$item['product_id']];
                    $productFile = $this->data['productFileModel']->getProductFile($itemDetail['id'])->fetch_assoc();
                    $total = $itemDetail['price'] * $item['quantity'];
                    $imagePath = '../../public/storage/image/'. $productFile['file_name'];
                    $cartTable .= 
                    "
                    <tr>
                        <td>
                            <img src='{$imagePath}' alt='Product Image' style='width:200px;height:250px;'>
                        </td>
                        <td>{$itemDetail['name']}</td>
                        <td>Rp {$itemDetail['price']}</td>
                        <td>
                            <input type='number' class='quantity-input' min='1' max='{$itemDetail['stock']}' value='{$item['quantity']}' data-product-id='{$itemDetail['id']} '>
                        </td>
                        <td>Rp $total</td>
                        <td>
                            <button class='update-cart-btn' onclick='updateCart(this)'>Update</button>
                            <button class='remove-from-cart-btn' onclick='deleteCartItem(this)'>Remove</button>
                        </td>
                    </tr>
                    ";
                }

                echo
                "
                <table class='cart-items'>
                    <thead>
                        <tr>
                            <th>Pict</th>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        $cartTable
                    </tbody>
                </table>
                ";
            }
            ?>
        <div class="cart-actions">
            <a href="/products">Continue Shopping</a>
            <button class="checkout-btn">Checkout</button>
        </div>
    </div>

</body>
<?php
include(dirname(__DIR__) . '/template/Pagination.php');
echo pagination_template("Cart", $this->data["data"], $this->data["page"], $this->data["pageLimit"]);
?>

</html>
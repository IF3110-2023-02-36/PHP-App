<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/styles/template/Navbar.css">
    <link rel="stylesheet" href="../../public/styles/cart/cart.css"> <!-- Add a separate CSS file for cart styles -->
    <title>Shopping Cart</title>
</head>

<body>
    <?php
    $current_page = "Cart";
    include(dirname(__DIR__) . '/template/Navbar.php');
    ?>

    <div class="cart-container">
        <h2>Your Shopping Cart</h2>

        <?php if (empty($this->data['cartItems'])) : ?>
            <p>Your cart is empty.</p>
        <?php else : ?>
            <table class="cart-items">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($this->data['cartItems'] as $item) : ?>
                        <tr>
                            <td><?php echo $item['name']; ?></td>
                            <td>Rp <?php echo $item['price']; ?></td>
                            <td>
                                <input type="number" class="quantity-input" min="1" value="<?php echo $item['quantity']; ?>">
                            </td>
                            <td>Rp <?php echo $item['price'] * $item['quantity']; ?></td>
                            <td>
                                <button class="update-cart-btn">Update</button>
                                <button class="remove-from-cart-btn">Remove</button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>

        <div class="cart-actions">
            <a href="/products">Continue Shopping</a>
            <button class="checkout-btn">Checkout</button>
        </div>
    </div>

</body>

</html>
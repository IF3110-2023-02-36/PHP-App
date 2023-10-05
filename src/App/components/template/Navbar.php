<?php
$userLoggedIn = isset($_SESSION['user_id']);
$userIsAdmin = false;

if ($userLoggedIn) {
    require_once __DIR__ . '../../../models/UserModel.php';
    $userModel = new UserModel();
    $userData = $userModel->getCurrentUser();
    $userIsAdmin = $userData['category'] === 'admin';
}

$title = basename($_SERVER['PHP_SELF']);
$title = str_replace('.php', '', $title);
?>

<header>
    <nav id="site-menu">
        <ul>
            <li <?php if ($title == "index") echo 'aria-current="page"'; ?>><a href="/">Home</a></li>
            <!-- TODO : Remove this when development over  -->
            <li><a href="/Category.php">Category</a></li>
            <li><a href="/AddProduct.php">Add Product</a></li>
            <li><a href="/ManageProduct.php">Manage Product</a></li>

            <?php if (!$userLoggedIn) : ?>
                <!-- Display "Register" and "Log in" when not logged in -->
                <li><a href="/Login.php">Log in</a></li>
                <li><a href="/Register.php">Register</a></li>
            <?php elseif ($userLoggedIn && !$userIsAdmin) : ?>
                <!-- Display "Cart", "Profile", and "Log out" when logged in as a user -->
                <li <?php if ($title == "Cart") echo 'aria-current="page"'; ?>><a href="/Cart.php">Cart</a></li>
                <li <?php if ($title == "Profile") echo 'aria-current="page"'; ?>><a href="/Profile.php">Profile</a></li>
                <li><a href="/Logout.php">Log out</a></li>
            <?php elseif ($userLoggedIn && $userIsAdmin) : ?>
                <!-- Display "Manage Store", "Profile", and "Log out" when logged in as admin -->
                <li><a href="/Manage.php">Manage</a></li>
                <li <?php if ($title == "Profile") echo 'aria-current="page"'; ?>><a href="/Profile.php">Profile</a></li>
                <li><a href="/Logout.php">Log out</a></li>
            <?php endif; ?>
        </ul>
    </nav>
</header>
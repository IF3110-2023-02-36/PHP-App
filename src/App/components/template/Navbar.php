<?php
$title = basename($_SERVER['PHP_SELF']);
$title = str_replace('.php', '', $title);
?>

<link rel="stylesheet" href="../../public/styles/template/Navbar.css">
<header>
    <nav id="site-menu">
        <ul>
            <li <?php if ($title == "index") echo 'aria-current="page"'; ?>><a href="/">Home</a></li>

            <?php if ($this->userRole === 0) : ?>
                <!-- Display "Register" and "Log in" when not logged in -->
                <li><a href="/Login.php">Log in</a></li>
                <li><a href="/Register.php">Register</a></li>
            <?php elseif ($this->userRole === 1) : ?>
                <!-- Display "Cart", "Profile", and "Log out" when logged in as a user -->
                <li <?php if ($title == "Cart") echo 'aria-current="page"'; ?>><a href="/Cart.php">Cart</a></li>
                <li <?php if ($title == "Profile") echo 'aria-current="page"'; ?>><a href="/Profile.php">Profile</a></li>
                <li><a href="/Logout.php">Log out</a></li>
            <?php elseif ($this->userRole === 2) : ?>
                <!-- Display "Manage Store", "Profile", and "Log out" when logged in as admin -->
                <li <?php if ($title == "Category") echo 'aria-current="page"'; ?>><a href="/Category.php">Category</a></li>
                <li <?php if ($title == "Profile") echo 'aria-current="page"'; ?>><a href="/Profile.php">Profile</a></li>
                <li><a href="/Logout.php">Log out</a></li>
            <?php endif; ?>
        </ul>
    </nav>
</header>
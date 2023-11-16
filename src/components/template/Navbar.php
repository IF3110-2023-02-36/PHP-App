<?php
$title = basename($_SERVER['PHP_SELF']);
$title = str_replace('.php', '', $title);
?>

<link rel="stylesheet" href="../../styles/template/Navbar.css">
<header>
    <nav id="site-menu">
        <ul>
            <li <?php if ($title == "index") echo 'aria-current="page"'; ?>><a href="/">Home</a></li>

            <?php if ($this->userRole === 0) : ?>
                <!-- Display "Register" and "Log in" when not logged in -->
                <li><a href="/login">Log in</a></li>
                <li><a href="/register">Register</a></li>
            <?php elseif ($this->userRole === 1) : ?>
                <!-- Display "Cart", "Profile", and "Log out" when logged in as a user -->
                <li <?php if ($title == "cart") echo 'aria-current="page"'; ?>><a href="/cart">Cart</a></li>
                <li <?php if ($title == "track") echo 'aria-current="page"'; ?>><a href="/track">track</a></li>
                <li <?php if ($title == "profile") echo 'aria-current="page"'; ?>><a href="/profile">Profile</a></li>
                <li <?php if ($title == "history") echo 'aria-current="page"'; ?>><a href="/history">History</a></li>
                <li><a href="/logout">Log out</a></li>
            <?php elseif ($this->userRole === 2) : ?>
                <!-- Display "Category", "Profile", and "Log out" when logged in as admin -->
                <li <?php if ($title == "category") echo 'aria-current="page"'; ?>><a href="/category">Category</a></li>
                <li <?php if ($title == "profile") echo 'aria-current="page"'; ?>><a href="/profile">Profile</a></li>
                <li><a href="/logout">Log out</a></li>
            <?php endif; ?>
        </ul>
    </nav>
</header>
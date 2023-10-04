<?php
function isUserLoggedIn()
{
    return isset($_SESSION['user_username']);
}

function isUserAdmin()
{
    return isset($_SESSION['user_category']) && $_SESSION['user_category'] === 'admin';
}

$userLoggedIn = isUserLoggedIn();
$userIsAdmin = isUserAdmin();
?>

<header>
    <nav id="site-menu">
        <ul>
            <li <?php if ($current_page == "home") echo 'aria-current="page"'; ?>><a href="/">Home</a></li>
            <li <?php if ($current_page == "categories") echo 'aria-current="page"'; ?>><a href="/Category.php">Categories</a></li>

            <li class="search-bar">
                <form action="/Search.php" method="GET">
                    <input type="text" name="query" placeholder="Search...">
                    <button type="submit">Search</button>
                </form>
            </li>

            <?php if (!$userLoggedIn) : ?>
                <!-- Display "Register" and "Log in" when not logged in -->
                <li><a href="/Login.php">Log in</a></li>
                <li><a href="/Register.php">Register</a></li>
            <?php elseif ($userLoggedIn && !$userIsAdmin) : ?>
                <!-- Display "Cart", "Profile", and "Log out" when logged in as a user -->
                <li <?php if ($current_page == "cart") echo 'aria-current="page"'; ?>><a href="/Cart.php">Cart</a></li>
                <li <?php if ($current_page == "profile") echo 'aria-current="page"'; ?>><a href="Profile.php">Profile</a></li>
                <li><a href="/Logout.php">Log out</a></li>
            <?php elseif ($userLoggedIn && $userIsAdmin) : ?>
                <!-- Display "Manage Store", "Profile", and "Log out" when logged in as admin -->
                <li><a href="/Manage.php">Manage</a></li>
                <li <?php if ($current_page == "profile") echo 'aria-current="page"'; ?>><a href="Profile.php">Profile</a></li>
                <li><a href="/Logout.php">Log out</a></li>
            <?php endif; ?>
        </ul>
    </nav>
</header>
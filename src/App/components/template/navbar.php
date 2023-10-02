<?php
function isUserLoggedIn()
{
    return isset($_SESSION['user_id']);
}

function isUserAdmin()
{

    return isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'admin';
}

$userLoggedIn = isUserLoggedIn();
$userIsAdmin = isUserAdmin();
?>

<header>
    <nav id="site-menu">
        <ul>
            <li <?php if ($current_page == "home") echo 'aria-current="page"'; ?>><a href="/">Home</a></li>
            <li <?php if ($current_page == "categories") echo 'aria-current="page"'; ?>><a href="/categories.php">Categories</a></li>
            <li <?php if ($current_page == "search") echo 'aria-current="page"'; ?>><a href="/search.php">Search</a></li>

            <?php if (!$userLoggedIn) : ?>
                <!-- Display "Register" and "Log in" when not logged in -->
                <li><a href="/login.php">Log in</a></li>
                <li><a href="/register.php">Register</a></li>
            <?php elseif ($userLoggedIn && !$userIsAdmin) : ?>
                <!-- Display "Cart", "Profile", and "Log out" when logged in as a user -->
                <li <?php if ($current_page == "cart") echo 'aria-current="page"'; ?>><a href="/cart.php">Cart</a></li>
                <li <?php if ($current_page == "profile") echo 'aria-current="page"'; ?>><a href="profile.php">Profile</a></li>
                <li><a href="/logout.php">Log out</a></li>
            <?php elseif ($userLoggedIn && $userIsAdmin) : ?>
                <!-- Display "Manage Store", "Profile", and "Log out" when logged in as admin -->
                <li><a href="/manage.php">Manage</a></li>
                <li <?php if ($current_page == "profile") echo 'aria-current="page"'; ?>><a href="profile.php">Profile</a></li>
                <li><a href="/logout.php">Log out</a></li>
            <?php endif; ?>
        </ul>
    </nav>
</header>
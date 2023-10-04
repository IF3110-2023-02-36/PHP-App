<?php
if (isset($_SESSION["user_username"])) {
  header("location: /");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/styles/login/Login.css">
    <title>Login</title>
</head>

<body>
    <header>
        <p>Login</p>
    </header>
    <form action="" method="POST" enctype="multipart/form-data">
        <div>
            <label for="username">Username</label>
            <input type="text" name="username" placeholder="Username" id="username">
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" name="password" placeholder="Password" id="password">
        </div>
        <div>
            <button type="submit">Log in</button>
        </div>
    </form>
    <div>
        <p>Belum punya akun? <a href="/Register.php">Register</a>.</p>
    </div>
</body>
</html>
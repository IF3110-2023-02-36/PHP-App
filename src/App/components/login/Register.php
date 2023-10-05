<?php
if (isset($_SESSION["user_id"])) {
  header("location: /");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/styles/login/Login.css">
    <title>register</title>
</head>

<body>
    <header>
        <a class="a-header" href='/'>Home</a>
        <p>Register</p>
    </header>
    <form action="" method="POST" enctype="multipart/form-data">
        <div>
            <label for="name">Name</label>
            <input type="text" name="name" placeholder="Name" id="name">
        </div>
        <div>
            <label for="username">Username</label>
            <input type="text" name="username" placeholder="Username" id="username">
        </div>
        <div>
            <label for="email">Email</label>
            <input type="email" name="email" placeholder="Email" id="email">
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" name="password" placeholder="Password" id="password" autocomplete="on">
        </div>
        <div>
            <label for="confirm-password">Konfirmasi Password</label>
            <input type="password" name="confirm-password" placeholder="Konfirmasi Password" id="confirm-password" autocomplete="on">
        </div>
        <div>
            <button type="submit">Sign up</button>
        </div>
    </form>
    <div>
        <p>Sudah punya akun? <a href="/login">Login</a>.</p>
    </div>
</body>
</html>
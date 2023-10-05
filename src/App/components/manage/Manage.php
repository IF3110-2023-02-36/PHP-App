<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/styles/template/Navbar.css">
    <link rel="stylesheet" href="../../public/styles/manage/Manage.css"> 
    <title>Shop Management</title>
</head>
<body>
    <?php
    include(dirname(__DIR__) . '/template/Navbar.php');
    ?>
    <h1>Welcome to Shop Management</h1>
    <form action="/ManageProduct.php" method="get">
        <button type="submit">Manage Products</button>
    </form>
    <form action="/category.php" method="get">
        <button type="submit">Manage Categories</button>
    </form>
</body>
</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- global CSS -->
    <link rel="stylesheet" href="../../public/styles/product/ProductCard.css">
    <link rel="stylesheet" href="../../public/styles/template/Navbar.css">
    <title>Home Page</title>
</head>

<body>
    <?php
    $current_page = "Home";
    include(dirname(__DIR__) . '/template/Navbar.php');
    ?>
    <span class="background">
        <span class="centering">
            <h><?php if(isset($_SESSION['user_name']))echo "Halo " . $_SESSION['user_name'];?></h>
            <h1>Home Page</h1>
            <h2>List barang mu</h2>
            <section class="articles">
                <?php
                include_once(dirname(__DIR__) . "/template/ProductCard.php");
                
                foreach($this->data as $product){
                    product_card_template(
                    "https://vnn-imgs-a1.vgcloud.vn/toquoc.mediacdn.vn/280518851207290880/2022/9/25/iphone-15-ultra-7-16640892704142065627851.jpg",
                    $product[2],
                    $product[4],
                    $product[3],
                    "AIPONG");
                }
                ?>
            </section>
        </span>
    </span>
</body>

</html>
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
            <h1>Admin</h1>
            <h2>List barang jualan mu</h2>
            <section class="articles">
                <?php
                include_once(dirname(__DIR__) . "/template/ProductCard.php");
                
                foreach($this->data['product'] as $product){
                    foreach($this->data['productFile'] as $productFile){
                        if($product[0] == $productFile[1]){
                            $path = '../../public/storage/image/'. $productFile[2];
                            product_card_template(
                                $path,
                                $product[2],
                                $product[4],
                                $product[3],
                                "AIPONG",
                                $product[0],
                                True);
                            break;
                        }
                    }
                }
                ?>
            </section>
        </span>
    </span>
</body>

</html>
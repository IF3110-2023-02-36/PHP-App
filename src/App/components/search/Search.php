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

    <form action="/Search" method="POST">
        <label for="search">Search</label>
        <input type="text" name="search" placeholder="Search">

        <label for="sort">Sort by</label>
        <select name="sort" id="sort">
            <option value="name">nama</option>
            <option value="price">harga</option>
            <option value="stock">stok</option>
        </select>
        <select name="order" id="order">
            <option value="ASC">ASC</option>
            <option value="DESC">DESC</option>
        </select>

        <label for="category">Category</label>
        <select name="category" id="">
            <option value=''></option>
            <?php 
                foreach($this->data['category'] as $category){
                    echo "
                        <option value='$category[0]'>$category[1]</option>
                    ";
                }
            ?>
        </select>

        <label for="min-price">Min Price:</label>
        <input type="number" name="min-price">
    
        <label for="max-price">Max Price:</label>
        <input type="number" name="max-price">

        <button type="submit">search</button>
    </form>

    <span class="background">
        <span class="centering">
            <h><?php if(isset($_SESSION['user_name']))echo "Halo " . $_SESSION['user_name'];?></h>
            <h1>Home Page</h1>
            <h2>List barang mu</h2>
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
                                $product[0]);
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
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- global CSS -->
    <link rel="stylesheet" href="../../public/styles/product/ProductCard.css">
    <link rel="stylesheet" href="../../public/styles/template/Navbar.css">
    <script src="../../public/scripts/functions/debounce.js"></script>
    <title>Home Page</title>
</head>

<body>
    <?php
    include(dirname(__DIR__) . '/template/Navbar.php');
    ?>

    <form id="form" action="" method="POST" >
        <label for="search">Search</label>
        <input type="text" name="search" id="search" placeholder="Search" 
                value="<?= $this->data['search'] ?>">

        <label for="sort">Sort by</label>
        <select name="sort" id="sort">
            <option value="name" 
                <?php if($this->data['sort'] == "name")echo "selected";?>>
                nama</option>
            <option value="price" 
                <?php if($this->data['sort'] == "price")echo "selected";?>>
                harga</option>
            <option value="stock" 
                <?php if($this->data['sort'] == "stock")echo "selected";?>>
                stok</option>
        </select>
        <select name="order" id="order">
            <option value="ASC"
                <?php if($this->data['order'] == "ASC")echo "selected";?>>>
                ASC</option>
            <option value="DESC"
                <?php if($this->data['order'] == "DESC")echo "selected";?>>>
                DESC</option>
        </select>

        <label for="category">Category</label>
        <select name="category" id="category">
            <option value=''></option>
            <?php 
                foreach($this->data['category'] as $category){
                    $isSelected = ($this->data['category_id'] == $category[0]);
                    $selected = $isSelected ? 'selected' : '';
                    echo "
                        <option value='$category[0]' $selected>$category[1]</option>
                    ";
                }
            ?>
        </select>

        <label for="min-price">Min Price:</label>
        <input type="number" name="min-price" id="min-price" value=<?= $this->data['min-price']?>>
    
        <label for="max-price">Max Price:</label>
        <input type="number" name="max-price" id="max-price" value=<?= $this->data['max-price']?>>
    </form>

    <span class="background">
        <span class="centering">
            <h1>Search</h1>
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
<script src="../../public/scripts/home/search.js"></script>
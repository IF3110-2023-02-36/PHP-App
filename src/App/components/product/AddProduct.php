<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/styles/template/Navbar.css">
    <title>Tambah Produk</title>
    <link rel="stylesheet" href="../../public/styles/product/addProduct.css"> 
</head>
<body>
    <?php
    include(dirname(__DIR__) . '/template/Navbar.php');
    ?>

    <div class="product-form">
        <h1>Tambah Produk Baru</h1>
        <form action="/AddProduct" method="POST" enctype="multipart/form-data">
            <label for="product_name">Nama Produk:</label>
            <input type="text" id="product_name" name="product_name" value=<?=uniqid()?> required>

            <label for="product_category">Produk Kategori</label>
            <select name="product_category" id="product_category">
                <?php 
                foreach($this->data as $category){
                    $selected = $category[0] == rand(0,5) ? "selected" : "";
                    echo"<option value= $category[0] $selected> $category[1]</option>";
                }
                ?>
            </select>
            
            <label for="product_price">Harga Produk:</label>
            <input type="number" id="product_price" name="product_price" value=1 required>
            
            <label for="product_description">Deskripsi Produk:</label>
            <textarea id="product_description" name="product_description" rows="4" required><?=uniqid()?></textarea>
            
            <label for="product_stock">Stok Produk:</label>
            <input type="number" id="product_stock" name="product_stock" value=1 required>
            
            <label for="product_image">Gambar Produk:</label>
            <input type="file" id="product_image" name="product_image" accept="image/*">

            <label for="product_video">Video Produk:</label>
            <input type="file" id="product_video" name="product_video" accept="video/*">
            
            <button type="submit">Tambah Produk</button>
        </form>
    </div>
</body>
</html>

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
    $current_page = "Tambah Produk";
    include(dirname(__DIR__) . '/template/Navbar.php');
    ?>

    <div class="product-form">
        <h1>Tambah Produk Baru</h1>
        <form action="" method="POST" enctype="multipart/form-data">
            <label for="product_name">Nama Produk:</label>
            <input type="text" id="product_name" name="product_name" value= "<?php echo $this->data['name'];?>" required>
            
            <label for="product_price">Harga Produk:</label>
            <input type="number" id="product_price" name="product_price" value= "<?php echo $this->data['price'];?>" required>
            
            <label for="product_description">Deskripsi Produk:</label>
            <textarea id="product_description" name="product_description" rows="4" required><?php echo $this->data['description'];?></textarea>
            
            <label for="product_stock">Stok Produk:</label>
            <input type="number" id="product_stock" name="product_stock"  value="<?php echo $this->data['stock'];?>" required>
            
            <label for="product_image">Gambar Produk:</label>
            <input type="file" id="product_image" name="product_image" accept="image/*" >
            
            <button type="submit">edit Produk</button>
        </form>
    </div>
</body>
</html>

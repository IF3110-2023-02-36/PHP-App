<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/styles/template/Navbar.css">
    <title>Edit Produk</title>
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
            <input type="text" id="product_name" name="product_name" value= "<?php echo $this->data['data_product']['name'];?>" required>
            
            <label for="product_category">Produk Kategori</label>
            <select name="product_category" id="product_category">
                <?php 
                foreach($this->data['data_category'] as $category){
                    if($category[0] == $this->data['data_product']['category_id']){
                        echo"<option value= $category[0] selected> $category[1]</option>";
                    }else{
                        echo"<option value= $category[0]> $category[1]</option>";   
                    }
                    
                }
                ?>
            </select>

            <label for="product_price">Harga Produk:</label>
            <input type="number" id="product_price" name="product_price" value= "<?php echo $this->data['data_product']['price'];?>" required>
            
            <label for="product_description">Deskripsi Produk:</label>
            <textarea id="product_description" name="product_description" rows="4" required><?php echo $this->data['data_product']['description'];?></textarea>
            
            <label for="product_stock">Stok Produk:</label>
            <input type="number" id="product_stock" name="product_stock"  value="<?php echo $this->data['data_product']['stock'];?>" required>
            
            <label for="product_image">Gambar Produk:</label>
            <input type="file" id="product_image" name="product_image" accept="image/*" >
            
            <button type="submit">Edit Produk</button>
        </form>
        <form method="POST" action="/DeleteProduct.php/<?= $this->data['data_product']['id'] ?>">
            <button type="submit">Hapus Produk</button>
        </form>
    </div>
</body>
</html>

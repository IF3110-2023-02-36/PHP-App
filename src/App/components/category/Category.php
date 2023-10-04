<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/styles/template/Navbar.css">
    <link rel="stylesheet" href="../../public/styles/category/category.css">
    <link rel="stylesheet" href="../../public/styles/category/addCategory.css">
    <title>Kategori</title>
</head>
<body>
<?php
    $current_page = "Kategori";
    include(dirname(__DIR__) . '/template/Navbar.php');
    ?>

    <table>
        <thead>
            <tr>
                <th>no</th>
                <th>Nama Kategori</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
                $i = 1;
                foreach ($this->data as $category){
                    echo 
                    "
                    <tr>
                        <td>$i</td>
                        <td>$category[1]</td>
                        <td><button>edit</button></td>
                        <td><button>delete</button></td>
                    </tr>
                    ";
                    $i++;
                }
            ?>
        </tbody>
    </table>
    <main>
        <form action="proses_tambah_kategori.php" method="POST">
            <label for="nama_kategori">Nama Kategori:</label>
            <input type="text" id="nama_kategori" name="nama_kategori" required>
            
            <button type="submit">Tambah Kategori</button>
        </form>
    </main>
</body>
</html>
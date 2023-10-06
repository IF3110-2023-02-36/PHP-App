<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/styles/template/Navbar.css">
    <link rel="stylesheet" href="../../public/styles/category/category.css">
    <link rel="stylesheet" href="../../public/styles/category/addCategory.css">
    <script src="../../public/scripts/Category/category.js"></script>
    <title>Kategori</title>
</head>
<body>
<?php
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
                $i = ($this->data["page"] - 1) * $this->data["pageLimit"] + 1;
                foreach ($this->data["pageData"] as $category){
                    echo 
                    "
                    <tr>
                        <form>
                            <td>$i</td>
                            <td class='category-name'>$category[1]</td>
                            <td class='edit-button'><button onclick='editCategory(this.parentNode.parentNode, $category[0])'>edit</button></td>
                            <td><button onclick='deleteCategory($category[0])'>delete</button></td>
                        </form>
                    </tr>
                    ";
                    $i++;
                }
            ?>
        </tbody>
    </table>
    <main>
        <form action="/AddCategory.php" method="POST">
            <label for="category_name">Nama Kategori:</label>
            <input type="text" id="category_name" name="category_name" required>
            <button type="submit">Tambah Kategori</button>
        </form>
    </main>
   

</body>
<?php
include(dirname(__DIR__) . '/template/Pagination.php');
echo pagination_template("Category", $this->data["data"], $this->data["page"], $this->data["pageLimit"]);
?>

</html>
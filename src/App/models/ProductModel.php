<?php


class ProductModel extends Model{

    public function getAllProduct(){
        $query = "SELECT * FROM products";
        return $this->database->execute($query);
    }

    public function getProductById($id){
        $query = "SELECT * FROM products WHERE id = $id";
        return $this->database->execute($query);
    }
    public function addProduct($category_id, $name, $description, $price, $stock){
        $stmt = $this->database->getConn()->prepare("INSERT INTO products (category_id, name, description, price, stock) VALUES (?, ?, ?, ?, ?)");

        $stmt->bind_param("issii", $category_id, $name, $description, $price, $stock);
    
    // Menjalankan pernyataan SQL
        if ($stmt->execute()) {
            return true; // Produk berhasil ditambahkan
        } else {
            return false; // Gagal menambahkan produk
        }
        // $query = "INSERT INTO `products` (`id`, `category_id`, `name`, `description`, `price`, `stock`) VALUES (NULL, $category_id, $name, $description, $price, $stock);";

        // return $this->database->execute($query);
    }

    public function updateProduct($id, $category_id, $name, $description, $price, $stock){
        $stmt = $this->database->getConn()->prepare("UPDATE products SET category_id = ?, name = ?, description = ?, price = ?, stock = ? WHERE id =$id");

        $stmt->bind_param("issii", $category_id, $name, $description, $price, $stock);
    
    // Menjalankan pernyataan SQL
        if ($stmt->execute()) {
            return true; // Produk berhasil ditambahkan
        } else {
            return false; // Gagal menambahkan produk
        }
    }

    public function buy($id, $stock, $buyed){
        $query = "UPDATE products SET stock = $stock-$buyed WHERE id = $id;";

        return $this->database->execute($query);
    }

    public function deleteProduct($id){
        $query = "DELETE FROM products WHERE id = ?";

        $stmt = $this->database->getConn()->prepare($query);
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            echo "Record deleted successfully.";
        } else {
            echo "Error deleting record " ;
        }
    }

}
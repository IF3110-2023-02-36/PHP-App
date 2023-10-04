<?php

class CategoryModel extends Model{
    public function getCategory(){
        $query = "SELECT * FROM categories";
        
        return $this->database->execute($query);
    }

    public function addCategory($name){
        $stmt = $this->database->getConn()->prepare("INSERT INTO categories (name) VALUES (?)");

        $stmt->bind_param("s", $name);
    
    // Menjalankan pernyataan SQL
        if ($stmt->execute()) {
            return true; // Produk berhasil ditambahkan
        } else {
            return false; // Gagal menambahkan 
        }
    }

    public function deleteCategory($id){
        $query = "DELETE FROM categories WHERE id = ?";

        $stmt = $this->database->getConn()->prepare($query);
        var_dump($stmt);
        $stmt->bind_param("i", $id);
        var_dump($stmt);

        if ($stmt->execute()) {
            echo "Record deleted successfully.";
        } else {
            echo "Error deleting record " ;
        }
    }

    public function updateCategory($id, $name){
        $stmt = $this->database->getConn()->prepare("UPDATE categories SET name = ? WHERE id =$id");

        $stmt->bind_param("s", $name);
    
    // Menjalankan pernyataan SQL
        if ($stmt->execute()) {
            return true; // Produk berhasil ditambahkan
        } else {
            return false; // Gagal menambahkan produk
        }
    }
}
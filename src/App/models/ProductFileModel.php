<?php 

class ProductFileModel extends Model{

    public function getAllProductFile(){
        $query = "SELECT * FROM product_files";
        
        return $this->database->execute($query);
    }
    public function getProductFile($product_id){
        $query = "SELECT * FROM product_files WHERE product_id = '$product_id'";
        
        return $this->database->execute($query);
    }

    public function addProductFile($product_id, $file_name, $file_extension){
        $stmt = $this->database->getConn()->prepare("INSERT INTO product_files (product_id, file_name, file_extension) VALUES (?, ?, ?)");

        $stmt->bind_param("iss", $product_id, $file_name, $file_extension);
    
        if ($stmt->execute()) {
            return true; // Produk berhasil ditambahkan
        } else {
            return false; // Gagal menambahkan produk
        }
    }
}
<?php


class ProductModel extends Model{

    public function getAllProduct(){
        $query = "SELECT * FROM products ORDER BY name ASC";
        
        return $this->database->execute($query);
    }

    public function getProductRequested($q, $sortVar, $order, $category_id, $minPrice = null, $maxPrice = null){
        $query = "SELECT * FROM products WHERE 1=1";
    
        if (!empty($q)) {
            $query .= " AND name LIKE '%$q%'";
        }
    
        if (!empty($category_id)) {
            $query .= " AND category_id = $category_id";
        }
    
        if (!empty($minPrice)) {
            $query .= " AND price >= $minPrice";
        }
        if (!empty($maxPrice)) {
            $query .= " AND price <= $maxPrice";
        }
        if(!empty($sortVar)){
            $query .= " ORDER BY $sortVar $order";
        }
        
    
        $result = $this->database->execute($query);
    
        return $result;
    }
    

    public function getSortedProduct($column){
        $query = "SELECT * FROM products ORDER BY $column ASC";

        return $this->database->execute($query);
    }

    public function search($query, $data){
        $match = [];
        // print_r($data);
        foreach ($data as $product){
            if(stristr($product[2], $query)){
                array_push($match, $product);
            }
        }
        return $match;
    }

    public function filter ($category_id, $data){
        $match = [];
        foreach ($data as $product){
            if($product[1] == $category_id){
                array_push($match, $product);
            }
        }

        return $match;
    }

    public function getProductById($id){
        $query = "SELECT * FROM products WHERE id = $id";
        return $this->database->execute($query);
    }

    public function getProductByName($product_name){
        $query = "SELECT * FROM products WHERE name = '$product_name'";
        return $this->database->execute($query);
    }

    public function addProduct($category_id, $name, $description, $price, $stock){
        $stmt = $this->database->getConn()->prepare("INSERT INTO products (category_id, name, description, price, stock) VALUES (?, ?, ?, ?, ?)");

        $stmt->bind_param("issii", $category_id, $name, $description, $price, $stock);
    
        if ($stmt->execute()) {
            return true; // Produk berhasil ditambahkan
        } else {
            return false; // Gagal menambahkan produk
        }
    }

    public function updateProduct($id, $category_id, $name, $description, $price, $stock){
        $stmt = $this->database->getConn()->prepare("UPDATE products SET category_id = ?, name = ?, description = ?, price = ?, stock = ? WHERE id =$id");

        $stmt->bind_param("issii", $category_id, $name, $description, $price, $stock);
        
        if ($stmt->execute()) {
            return true; 
        } else {
            return false; 
        }
    }

    public function buy($id, $quantity){
        $query = "UPDATE products SET stock = stock-$quantity WHERE id = $id;";

        return $this->database->execute($query);
    }

    public function deleteProduct($id){
        $query = "DELETE FROM carts WHERE product_id = ?";
        $stmt = $this->database->getConn()->prepare($query);
        $stmt->bind_param("i", $id);
        $executeOk = $stmt->execute();
        if(!$executeOk)throw new Exception('Cart deletion error', 400);

        $query = "DELETE FROM product_files WHERE product_id = ?";
        $stmt = $this->database->getConn()->prepare($query);
        $stmt->bind_param("i", $id);
        $executeOk = $stmt->execute();
        if(!$executeOk)throw new Exception('File deletion error', 400);

        $query = "DELETE FROM products WHERE id = ?";
        $stmt = $this->database->getConn()->prepare($query);
        $stmt->bind_param("i", $id);
        $executeOk = $stmt->execute();
        if(!$executeOk)throw new Exception('Deletion error', 400);
    }

    public function deleteProductByCategory($category_id){
        $products = $this->getProductByCategory($category_id)->fetch_all();

        foreach($products as $product){
            $this->deleteProduct($product[0]);
        }
    }
    public function getProductByCategory($category_id){
        $query = "SELECT * FROM products WHERE category_id = '$category_id'";
        return $this->database->execute($query);
    }

}
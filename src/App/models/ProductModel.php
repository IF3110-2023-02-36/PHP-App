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
    
        if (!empty($category)) {
            $query .= " AND category_id = $category_id";
        }
    
        if (!is_null($minPrice)) {
            $query .= " AND price >= $minPrice";
        }
        if (!is_null($maxPrice)) {
            $query .= " AND price <= $maxPrice";
        }
    
        $query .= " ORDER BY $sortVar $order";
    
        // Eksekusi kueri SQL
        $result = $this->database->execute($query);
    
        // Mengembalikan hasil kueri
        return $result;
    }
    

    public function getSortedProduct($column){
        $query = "SELECT * FROM products ORDER BY $column ASC";

        return $this->database->execute($query);
    }

    public function search($query, $data){
        $match = [];
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
        $isProductExist = $this->checkValueExist("products", "name", $name);
        if($isProductExist)throw new Exception('Product already exist', 400);

        $stmt = $this->database->getConn()->prepare("INSERT INTO products (category_id, name, description, price, stock) VALUES (?, ?, ?, ?, ?)");

        $stmt->bind_param("issii", $category_id, $name, $description, $price, $stock);
        $executeOk = $stmt->execute();
        if(!$executeOk)throw new Exception('Insertion error', 400);
        return $executeOk;
    }

    public function updateProduct($id, $category_id, $name, $description, $price, $stock){
        $query = "UPDATE products SET category_id = ?, name = ?, description = ?, price = ?, stock = ? WHERE id = ?";
        $stmt = $this->database->getConn()->prepare($query);

        $stmt->bind_param("issiii", $category_id, $name, $description, $price, $stock, $id);
        $executeOk = $stmt->execute();
        if(!$executeOk)throw new Exception('Update error', 400);
        return $executeOk;
    }

    public function buy($id, $stock, $buyed){
        $query = "UPDATE products SET stock = ? - ? WHERE id = ?";
        $stmt = $this->database->getConn()->prepare($query);

        $stmt->bind_param("iii", $stock, $buyed, $id);

        return $stmt->execute();
    }

    public function deleteProduct($id){
        $query = "DELETE FROM products WHERE id = ?";

        $stmt = $this->database->getConn()->prepare($query);
        $stmt->bind_param("i", $id);
        $executeOk = $stmt->execute();
        if(!$executeOk)throw new Exception('Deletion error', 400);
        return $executeOk;
    }
}
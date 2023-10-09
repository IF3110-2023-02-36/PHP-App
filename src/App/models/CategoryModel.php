<?php

class CategoryModel extends Model{
    public function getCategory(){
        $query = "SELECT * FROM categories";
        
        return $this->database->execute($query);
    }

    public function addCategory($name){
        if(strlen($name) > 25)throw new Exception('Category name is too long', 400);
        $isCategoryExist = $this->checkValueExist("categories", "name", $name);
        if($isCategoryExist)throw new Exception('Category already exist', 400);

        $stmt = $this->database->getConn()->prepare("INSERT INTO categories (name) VALUES (?)");
        $stmt->bind_param("s", $name);
        $executeOk = $stmt->execute();
        if(!$executeOk)throw new Exception("SQL query failed", 400);
    }

    public function deleteCategory($id){
        $query = "DELETE FROM categories WHERE id = ?";

        $stmt = $this->database->getConn()->prepare($query);
        $stmt->bind_param("i", $id);
        $executeOk = $stmt->execute();
        if(!$executeOk)throw new Exception("SQL query failed", 400);
    }

    public function updateCategory($id, $name){
        if(strlen($name) > 25)throw new Exception('Category name is too long', 400);
        $stmt = $this->database->getConn()->prepare("UPDATE categories SET name = ? WHERE id = ?");

        $stmt->bind_param("si", $name, $id);
    
        $executeOk = $stmt->execute();
        if(!$executeOk)throw new Exception("SQL query failed", 400);
    }
}
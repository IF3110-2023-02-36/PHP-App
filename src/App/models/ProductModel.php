<?php


class ProductModel extends Model{

    public function getAllProduct(){
        $query = "SELECT * FROM products";
        return $this->database->execute($query);
    }

    // public function addProduct()

}
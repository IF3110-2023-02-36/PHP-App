<?php

class ProductModel{
    private $database;

    public function __construct(){
        $this->database = new Database();
    }

    public function getAllProduct(){
        $query = "SELECT * FROM products";
        return $this->database->execute($query);
    }

    // public function addProduct()

}
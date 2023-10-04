<?php

class AddProductController extends Controller{

    public function index(){
        $data = []; // TODO : get data kategori dulu

        $dir = __DIR__;
        $dir = explode("/", $dir);
        $folderName = end($dir);
        $className = get_class();
        $fileName = str_replace('Controller', '', $className);
        $view = $this->view($folderName, $fileName, $data);

        $view->render();
    }

    public function post(){
        $product_name = $_POST["product_name"];
        $product_price = $_POST["product_price"];
        $product_description = $_POST["product_description"];
        $product_stock = $_POST["product_stock"];
        
        $productModel = $this->model("ProductModel");

        $productModel->addProduct(1, $product_name, $product_description, $product_price, $product_stock);
    }
}
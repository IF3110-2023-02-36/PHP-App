<?php

class EditProductController extends Controller{

    public function index($id){
        $productModel = $this->model("ProductModel");

        $data = $productModel->getProductById($id)->fetch_assoc();

        $dir = __DIR__;
        $dir = explode("/", $dir);
        $folderName = end($dir);
        $className = get_class();
        $fileName = str_replace('Controller', '', $className);
        $view = $this->view($folderName, $fileName, $data);

        $view->render();
    }

    public function post($id){
        $product_name = $_POST["product_name"];
        $product_price = $_POST["product_price"];
        $product_description = $_POST["product_description"];
        $product_stock = $_POST["product_stock"];
        
        $productModel = $this->model("ProductModel");

        $productModel->updateProduct($id, 1, $product_name, $product_description, $product_price, $product_stock);
    }
}
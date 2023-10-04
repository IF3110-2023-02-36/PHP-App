<?php

// use Controller;

class ProductController extends Controller{
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

    public function delete($id){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            throw new Exception('Method not allowed', 405);
        }
        $productModel = $this->model("ProductModel")->deleteProduct($id);
    }
}
<?php

// use Controller;

class ProductController extends Controller{
    public function index($id){
        if($this->userRole !== 1) {
            throw new Exception("You are not allowed to view this page", 405);
        }
        
        $productModel = $this->model("ProductModel");

        $product = $productModel->getProductById($id)->fetch_assoc();

        $productFileModel = $this->model("ProductFileModel");

        $productFile = $productFileModel->getProductFile($id)->fetch_all();

        $data = [
            'product' => $product,
            'productFile' => $productFile
        ];

        $dir = __DIR__;
        $dir = explode("/", $dir);
        $folderName = end($dir);
        $className = get_class();
        $fileName = str_replace('Controller', '', $className);
        $view = $this->view($folderName, $fileName, $data);

        $view->render();
    }
}
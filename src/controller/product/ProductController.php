<?php

// use Controller;

class ProductController extends Controller{
    public function index($id){
        if($this->userRole === 2) {
            throw new Exception("You are not allowed to view this page", 405);
        }else if($this->userRole === 0) {
            header("Location: /login");
            exit();
        }
        
        $productModel = $this->model("ProductModel");

        $product = $productModel->getProductById($id)->fetch_assoc();

        $productFileModel = $this->model("ProductFileModel");

        $productFile = $productFileModel->getProductFile($id)->fetch_all();

        $data = [
            'product' => $product,
            'productFile' => $productFile
        ];

        $this->render($data);
    }
}
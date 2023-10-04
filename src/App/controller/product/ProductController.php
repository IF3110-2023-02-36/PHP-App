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
}
<?php

class EditProductController extends Controller{

    public function index($id){
        $productModel = $this->model("ProductModel");

        $data_product = $productModel->getProductById($id)->fetch_assoc();

        $categoryModel = $this->model("CategoryModel");

        $data_category = $categoryModel->getCategory()->fetch_all();

        $data = [
            'data_product' => $data_product,
            'data_category' => $data_category
        ];

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
        $product_category = $_POST["product_category"];
        $product_price = $_POST["product_price"];
        $product_description = $_POST["product_description"];
        $product_stock = $_POST["product_stock"];
        
        $productModel = $this->model("ProductModel");

        $productModel->updateProduct($id, $product_category, $product_name, $product_description, $product_price, $product_stock);

        header("Location: /");
        
    }
}
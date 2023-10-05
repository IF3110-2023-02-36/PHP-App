<?php

class ManageProductController extends Controller{
    public function index() {
        $productModel = $this->model("ProductModel");

        $product = $productModel->getAllProduct()->fetch_all();

        $productFileModel = $this->model("ProductFileModel");

        $productFile = $productFileModel->getAllProductFile()->fetch_all();

        $data = [
            "product" => $product,
            "productFile" => $productFile
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
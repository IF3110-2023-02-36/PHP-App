<?php

class HomeController extends Controller{
    public function index(){
        $this->loadSearch();
    }

    public function post($page = 1){
        $this->loadSearch($page);
    }

    private function loadSearch($page = 1) {
        $query = "";
        $sortVar = "";
        $order = null;
        $category_id = null;
        $minPrice = null;
        $maxPrice = null;
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $query = $_POST['search'];
            $sortVar = $_POST['sort'];
            $order = $_POST['order'];
            $category_id = $_POST['category'];
            $minPrice = $_POST['min-price'];
            $maxPrice = $_POST['max-price'];
        }
        
        $productModel = $this->model("ProductModel");

        $product = $productModel->getProductRequested($query, $sortVar, $order, $category_id, $minPrice, $maxPrice)->fetch_all();

        $productFileModel = $this->model("ProductFileModel");

        $productFile = $productFileModel->getAllProductFile()->fetch_all();

        $categoryModel = $this->model("CategoryModel");

        $category = $categoryModel->getCategory()->fetch_all();


        
        require_once __DIR__ . '/../function/arrayPagination.php';
        $pageProduct = arrayPagination($product, $page, $this->pageLimit);

        $data = [
            "data" => $product,
            "page" => $page,
            "pageLimit" => $this->pageLimit,

            "product" => $pageProduct,
            "productFile" => $productFile,
            "category" => $category,

            "search" => $query,
            "sort" => $sortVar,
            "order" => $order,
            "category_id" => $category_id,
            "min-price" => $minPrice,
            "max-price" => $maxPrice
        ];

        $this->render($data);
    }
}
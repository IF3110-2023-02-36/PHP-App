<?php

// use Controller;

class ProductController extends Controller{
    public function index(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            throw new Exception('Method not allowed', 405);
        }
        $productModel = $this->model("ProductModel");

        $data = $productModel->getAllProduct()->fetch_all();
        // print_r($data);

        // require_once __DIR__. "./../components/home.php";
        $view = $this->view('home', 'HomePageView', $data);

        $view->render();
    }


    public function show($id){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            throw new Exception('Method not allowed', 405);
        }
        $productModel = $this->model("ProductModel");

        $data = $productModel->getProductById($id)->fetch_assoc();
        // print_r($data);
        // echo $data['name'];

        // require_once __DIR__. "./../components/home.php";
        $view = $this->view('product', 'product', $data);

        $view->render();
    }

    public function create(){
        if($_SERVER['REQUEST_METHOD'] == 'GET'){
            throw new Exception('Method not allowed', 405);
        }
        $data = []; //get data kategori dulu
        $view = $this->view('product', 'addProduct', $data);

        $view->render();

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $product_name = $_POST["product_name"];
            $product_price = $_POST["product_price"];
            $product_description = $_POST["product_description"];
            $product_stock = $_POST["product_stock"];
            
            $productModel = $this->model("ProductModel");

            $productModel->addProduct(1, $product_name, $product_description, $product_price, $product_stock);
            // $stmt = $productModel->conn->prepare($sql);
            // $eval = $productModel->addProduct(1, $product_name,  $product_description, $product_price, $product_stock);
        }
    }

    public function store(){

    }

    public function edit($id){
        if($_SERVER['REQUEST_METHOD'] == 'GET'){
            throw new Exception('Method not allowed', 405);
        }
        $productModel = $this->model("ProductModel");

        $data = $productModel->getProductById($id)->fetch_assoc();

        // print_r($data);

        $view = $this->view('product', 'editProduct', $data);

        $view->render();

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $product_name = $_POST["product_name"];
            $product_price = $_POST["product_price"];
            $product_description = $_POST["product_description"];
            $product_stock = $_POST["product_stock"];
            
            $productModel = $this->model("ProductModel");

            $productModel->updateProduct($id, 1, $product_name, $product_description, $product_price, $product_stock);
            // $stmt = $productModel->conn->prepare($sql);
            // $eval = $productModel->addProduct(1, $product_name,  $product_description, $product_price, $product_stock);
        }
    }

    public function update(){

    }

    public function delete($id){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            throw new Exception('Method not allowed', 405);
        }
        $productModel = $this->model("ProductModel")->deleteProduct($id);
    }
}
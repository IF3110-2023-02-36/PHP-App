<?php

// use Controller;

class ProductController extends Controller{
    public function index(){
        $productModel = $this->model("ProductModel");

        $data = $productModel->getAllProduct();
        // print_r($data);

        // require_once __DIR__. "./../components/home.php";
        $view = $this->view('home', 'HomePageView', $data);

        $view->render();
    }
}
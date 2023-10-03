<?php

class HomeController extends Controller{
    public function index() {
        $productModel = $this->model("ProductModel");

        $data = $productModel->getAllProduct();

        $view = $this->view('home', 'Home', $data);

        $view->render();
    }
}
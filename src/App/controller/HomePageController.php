<?php

class HomePageController extends Controller{
    public function index() {
        $productModel = $this->model("ProductModel");

        $data = $productModel->getAllProduct();

        $view = $this->view('home', 'home', $data);

        $view->render();
    }
}
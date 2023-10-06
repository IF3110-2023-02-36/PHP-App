<?php

class CartController extends Controller {
    public function index() {
        if($this->userRole !== 1) {
            throw new Exception("You are not allowed to view this page", 405);
        }

        $cartModel = $this->model("CartModel");
        $cart = $cartModel->getUserCart($_SESSION['user_id']);
        
        $cartItems = [];
        $productModel = $this->model("ProductModel");
        foreach ($cart as $cartItem) {
            $cartItems[$cartItem['product_id']] = $productModel->getProductById($cartItem['product_id'])->fetch_assoc();
        }

        $productFileModel = $this->model("ProductFileModel");
    
        $data = [
            "cart" => $cart,
            "cartItems" => $cartItems,
            "productFileModel" => $productFileModel
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

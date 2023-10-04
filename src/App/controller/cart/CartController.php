<?php

class CartController extends Controller {
    public function index() {
        $cartModel = $this->model("CartModel");
        $cart = $cartModel->getUserCart($_SESSION['user_id']);
        
        $cartItems = [];
        $productModel = $this->model("ProductModel");
        foreach ($cart as $cartItem) {
            $cartItems[$cartItem['product_id']] = $productModel->getProductById($cartItem['product_id'])->fetch_assoc();
        }

        $data = [
            "cart" => $cart,
            "cartItems" => $cartItems
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

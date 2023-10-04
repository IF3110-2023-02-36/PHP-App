<?php

class AddCartController extends Controller{
    public function post($productId){
        $cartModel = $this->model("CartModel");
        $cartModel->addProductToCart($_SESSION['user_id'], $productId, $_POST['quantity']);
        header("Location: /");
    }
}
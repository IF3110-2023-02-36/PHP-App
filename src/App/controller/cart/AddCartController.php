<?php

class AddCartController extends Controller{
    public function post($productId){
        if($this->userRole !== 1) {
            throw new Exception("You are not allowed to view this page", 405);
        }

        $cartModel = $this->model("CartModel");
        $cartModel->addProductToCart($_SESSION['user_id'], $productId, $_POST['quantity']);
        header("Location: /");
    }
}
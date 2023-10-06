<?php

class AddCartController extends Controller{
    public function post($productId){
        if($this->userRole !== 1) {
            throw new Exception("You are not allowed to view this page", 405);
        }

        $userId = $_SESSION['user_id'];
        $quantity = $_POST['quantity'];
        
        $cartModel = $this->model("CartModel");
        if($cartModel->isProductInCart($userId, $productId)){
            echo "Product sudah ada di cart";
        }else{
            $cartModel->addProductToCart($userId, $productId, $quantity);
            header("Location: /");
        }
        
    }
}
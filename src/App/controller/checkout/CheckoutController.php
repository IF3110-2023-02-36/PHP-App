<?php 

class CheckoutController extends Controller{
    public function post(){
        $userId = $_SESSION['user_id'];

        $CartModel = $this->model('CartModel');
        $carts = $CartModel->getUserCart($userId);
        
        $productModel = $this->model('ProductModel');

        foreach($carts as $cart){
            $productModel->buy($cart['product_id'], $cart['quantity']);
            $CartModel->removeProductFromCart($userId, $cart['product_id']);
        }

        
        header("Location: /Cart");
    }
}

?>
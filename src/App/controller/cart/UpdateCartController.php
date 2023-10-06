<?php 

    class UpdateCartController extends Controller{
        public function post(){
            $user_id = $_SESSION['user_id'];
            $product_id = $_POST['product_id'];
            $new_quantity = $_POST['new_quantity'];
    
            $cartModel = $this->model("CartModel");
            $cartModel = $cartModel->updateProductFromCart($user_id, $product_id, $new_quantity);
    
            header("Location: /Cart");
        }
    }
?>
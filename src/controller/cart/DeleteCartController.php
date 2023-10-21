<?php 

class DeleteCartController extends Controller{
    public function post(){
        $product_id = $_POST['product_id'];
        $user_id = $_SESSION['user_id'];

        $cartModel = $this->model('CartModel');
        $cartModel->removeProductFromCart($user_id, $product_id);

        header("Location: /Cart");
    }
}

?>
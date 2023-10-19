<?php

class CartController extends Controller {
    public function index($page = 1) {
        if($this->userRole === 2) {
            throw new Exception("You are not allowed to view this page", 405);
        }else if($this->userRole === 0) {
            header("Location: /login");
            exit();
        }

        $isCheckout = false;
        if($page === "checkout") {
            $isCheckout = true;
            $page = 1;
        }

        $cartModel = $this->model("CartModel");
        $cart = $cartModel->getUserCart($_SESSION['user_id']);
        
        $cartItems = [];
        $productModel = $this->model("ProductModel");
        foreach ($cart as $cartItem) {
            $cartItems[$cartItem['product_id']] = $productModel->getProductById($cartItem['product_id'])->fetch_assoc();
        }

        $productFileModel = $this->model("ProductFileModel");

        require_once __DIR__ . '/../function/arrayPagination.php';
        $pageCart = arrayPagination($cart, $page, $this->pageLimit);
    
        $data = [
            "data" => $cart,
            "page" => $page,
            "pageLimit" => $this->pageLimit,
            "checkout" => $isCheckout,

            "cart" => $pageCart,
            "cartItems" => $cartItems,
            "productFileModel" => $productFileModel
        ];

        $this->render($data);
    }
}

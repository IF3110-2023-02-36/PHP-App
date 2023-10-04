<?php

class CartController extends Controller
{
    public function index($userId)
    {
        $cartModel = $this->model("CartModel");
        $cart = $cartModel->getUserCart($userId);

        $cartItems = [];
        if ($cart) {
            $cartItems = $cartModel->getCartItems($cart['id']);
        }

        $data = [
            'cart' => $cart,
            'cartItems' => $cartItems,
        ];

        $view = $this->view('cart', 'cart', $data);
        $view->render();
    }

    public function add($userId, $productId, $quantity)
    {
        $cartModel = $this->model("CartModel");
        $result = $cartModel->addProductToCart($userId, $productId, $quantity);

        // if ($result) {
        //     // Product added to cart successfully
        // } else {
        //     // Failed to add the product to cart
        // }
    }

    public function remove($userId, $productId)
    {
        // Remove a product from the user's cart
        $cartModel = $this->model("CartModel");
        $result = $cartModel->removeProductFromCart($userId, $productId);

        // if ($result) {
        //     // Product removed from cart successfully
        // } else {
        //     // Failed to remove the product from cart
        // }
    }
}

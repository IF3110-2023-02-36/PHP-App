<?php

require_once __DIR__ . '/../../Soap/PesananSoap.php';

class TrackController extends Controller{
    public function index() {
        $userId = $_SESSION['user_id'];
        PesananSoap::setSoapClient("pesanan");
        $result = PesananSoap::getPesanan($userId);

        $data = [
            'pesanan' => $result
        ];
        $this->render($data);
        // foreach($carts as $cart){
        //     $productModel->buy($cart['product_id'], $cart['quantity']);
        //     $CartModel->removeProductFromCart($userId, $cart['product_id']);
        // }



        // $this->render();
    }
}
<?php 

require_once __DIR__ . '/../../Soap/PesananSoap.php';

class CheckoutController extends Controller{
    public function post(){
        $userId = $_SESSION['user_id'];
        $alamat = $_POST['alamat'];

        $biaya_pengiriman = rand(20, 50) * 1000;
        $keterangan = "lagi nyari kurir buat kamu, sabar ya";

        $CartModel = $this->model('CartModel');
        $userModel = $this->model('UserModel');
        $productModel = $this->model('ProductModel');

        $carts = $CartModel->getUserCart($userId);
        $nama_penerima = $userModel->getUserById($userId)[3];

        $nama_product = "";
        $harga = "";
        $quantity = "";
        foreach($carts as $cart){
            $quantity .= $cart["quantity"].",";
            $product = $productModel->getProductById($cart['product_id'])->fetch_assoc();
            $nama_product .= $product['name'] . ",";
            $harga .= $product['price'] .",";
        }

        // var_dump($userId);
        // var_dump($alamat);
        // var_dump($nama_penerima);
        // var_dump($keterangan);
        // var_dump($harga);
        // var_dump($biaya_pengiriman);
        // var_dump($nama_product);
        // var_dump($quantity);

        PesananSoap::setSoapClient("pesanan");
        $result = PesananSoap::sendPesanan($userId, $alamat, $nama_penerima, $keterangan, $harga, $biaya_pengiriman, $nama_product, $quantity);
        foreach($carts as $cart){
            $productModel->buy($cart['product_id'], $cart['quantity']);
            $CartModel->removeProductFromCart($userId, $cart['product_id']);
        }

        // var_dump($result);
        // var_dump($_POST['alamat']);

        header("Location: /cart/checkout");
    }
}

?>
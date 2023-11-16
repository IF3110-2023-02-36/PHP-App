<?php
require_once __DIR__ . '/../../Soap/DetailPesananSoap.php';
require_once __DIR__ . '/../../Soap/PesananSoap.php';
class TrackDetailController extends Controller{
    public function index($id = 0) {
        PesananSoap::setSoapClient("pesanan");
        $pesanan = PesananSoap::getPesananByIdPesanan($id);
        DetailPesananSoap::setSoapClient("detailPesanan");
        $detail = DetailPesananSoap::getDetailPesanan($id);

        $data = [
            'pesanan' => $pesanan,
            'detailpesanan' => $detail
        ];
        $this->render($data);


        $this->render();
    }
}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Track detail</title>
    <link rel="stylesheet" href="../../styles/Global.css">
    <link rel="stylesheet" href="../../styles/history/HistoryDetail.css">
</head>

<body>
    <?php
    include(dirname(__DIR__) . '/template/Navbar.php');
    ?>
    <div>
        <h1>Detail Pesanan</h1>
        <div class="container">
            <label>Nama Kurir : </label> 
            <p><?=$this->data['pesanan']->return->alamat?></p>
            <label>Biaya ongkir : </label> 
            <p><?=$this->data['pesanan']->return->biaya_pengiriman?></p>
            <label>Status : </label> 
            <p><?=$this->data['pesanan']->return->status?></p>
            <label>Keterangan : </label> 
            <p><?=$this->data['pesanan']->return->keterangan?></p>
            <label>Biaya ongkir : </label> 
            <p><?=$this->data['pesanan']->return->biaya_pengiriman?></p>
            <label>Alamat : </label> 
            <p><?=$this->data['pesanan']->return->alamat?></p>

            <h3>Pesanan Details</h3>
            <table>
                <tr>
                    <th>Product Name</th>
                    <th>Quantity</th>
                </tr>
                <?php 
                    $temp = "";
                    if(is_array($this->data['detailpesanan']->return)){
                        foreach ($this->data['detailpesanan']->return as $product) { 
                            $namaproduk = $product->nama_product;
                            $quantity = $product->quantity;
                            $temp .="
                                <tr>
                                    <td>$namaproduk</td>
                                    <td>$quantity</td>
                                </tr>
                            ";
                        } 
                    }else{
                        // var_dump($this->data['detailpesanan']);
                        $namaproduk = $this->data['detailpesanan']->return->nama_product;
                        $quantity = $this->data['detailpesanan']->return->quantity;
                        $temp .="
                            <tr>
                                <td>$namaproduk</td>
                                <td>$quantity</td>
                            </tr>
                        ";
                    }
                    echo $temp;
                    ?>
            </table>


        </div>
    </div>
</body>
</html>
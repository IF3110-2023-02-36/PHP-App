<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>History</title>
    <link rel="stylesheet" href="../../styles/Global.css">
    <link rel="stylesheet" href="../../styles/history/HistoryDetail.css">
</head>

<body>
    <?php
    include(dirname(__DIR__) . '/template/Navbar.php');
    ?>
    <div>
        <h1>Detail history</h1>
        <div class="container">
            <?php
            // TODO : fetch from REST
            // var_dump($this->data);
            $history = $this->data['history'];
            $productDetails = $this->data['details'];
            $kurir = $this->data['kurir'];
            ?>
            
            <label>Nama Kurir : </label> 
            <p><?=$kurir['name']?></p>
            <label>Biaya ongkir : </label> 
            <p><?=$history['biaya_pengiriman']?></p>
            <label>Rating : </label> 
            <p><?=($history['rating'] === 0) ? 'belum memberi rating' : $history['rating']?></p>
            <?php 
                if($history['rating'] === 0) {
                    $id = $history['id'] ;
                    $temp = '
                    <form action="/HistoryDetail" method="POST">
                        <input type="number" name="rating" min="1" max="5">
                        <input type="hidden" name="idPesanan" value=' . $id . '>
                        <input type="submit" value="Submit">
                    </form>';
                    echo $temp;
                }
            ?>
            
            <h3>Product Details</h3>
            <table>
                <tr>
                    <th>Product Name</th>
                    <th>Quantity</th>
                </tr>
                <?php foreach ($productDetails as $product) { ?>
                    <tr>
                        <td><?php echo $product['product_name']; ?></td>
                        <td><?php echo $product['quantity']; ?></td>
                    </tr>
                <?php } ?>
            </table>


        </div>
    </div>
</body>
</html>
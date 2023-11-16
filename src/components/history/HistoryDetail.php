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
            $history = ['courierName' => "jamal", 'shippingCost' => 2, 'rating' => 0, 'historyId' => 1];
            $productDetails = [
                ["productName" => "pisau cukur", "quantity" => 69],
                ["productName" => "ivan gunawan", "quantity" => 420],
                ["productName" => "pisau cukur 2", "quantity" => 692],
                ["productName" => "ivan gunawan 2", "quantity" => 4202],
            ];
            ?>
            
            <label>Nama Kurir : </label> 
            <p><?=$history['courierName']?></p>
            <label>Biaya ongkir : </label> 
            <p><?=$history['shippingCost']?></p>
            <label>Rating : </label> 
            <p><?=($history['rating'] === 0) ? 'belum memberi rating' : $history['rating']?></p>
            <?php 
                if($history['rating'] === 0) {
                    // TODO : giving rating
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
                        <td><?php echo $product['productName']; ?></td>
                        <td><?php echo $product['quantity']; ?></td>
                    </tr>
                <?php } ?>
            </table>


        </div>
    </div>
</body>
</html>
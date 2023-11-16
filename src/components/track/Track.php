<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Tracking</title>
    <link rel="stylesheet" href="../../styles/Global.css">
    <link rel="stylesheet" href="../../styles/history/History.css">
    <link rel="stylesheet" href="../../styles/history/HistoryCard.css">
</head>

<body>
    <?php
    include(dirname(__DIR__) . '/template/Navbar.php');
    ?>
    <div>
        <h1>Tracking pesananmu</h1>
        
        <span class="background">
            <span class="centering">
                <ul>
                    <?php
                    include_once(dirname(__DIR__) . "/template/PesananCard.php");

                    ?>
                    <section class="articles">
                    <?php
                    $index = 1;


                    // var_dump(count($this->data['pesanan']));
                    if(is_array($this->data['pesanan']->return)){
                        foreach ($this->data['pesanan']->return as $pesanan) {
                            pesanan_card_template(
                                "Pesanan".$index,
                                $pesanan->harga,
                                $pesanan->status,
                                $pesanan->id);
                            $index++;
                        }
                    }else{
                        foreach ($this->data['pesanan'] as $pesanan) {
                            pesanan_card_template(
                                "Pesanan".$index,
                                $pesanan->harga,
                                $pesanan->status,
                                $pesanan->id);
                            $index++;
                        }
                    }
                    
                    ?>
                    </section>
                </ul>
            </span>
        </span>
    </div>
</body>
</html>
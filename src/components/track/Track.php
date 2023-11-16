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
                    include_once(dirname(__DIR__) . "/template/HistoryCard.php");

                    ?>
                    <section class="articles">
                    <?php
                    $index = 1;
                    foreach ($this->data['pesanan'] as $pesanan) {
                        history_card_template(
                            "Pesanan".$index,
                            $pesanan['price'],
                            $pesanan['status'],
                            $pesanan['id']);
                        $index++;
                    }
                    ?>
                    </section>
                </ul>
            </span>
        </span>
    </div>
</body>
</html>
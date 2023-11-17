<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>History</title>
    <link rel="stylesheet" href="../../styles/Global.css">
    <link rel="stylesheet" href="../../styles/history/History.css">
    <link rel="stylesheet" href="../../styles/history/HistoryCard.css">
</head>

<body>
    <?php
    include(dirname(__DIR__) . '/template/Navbar.php');
    ?>
    <div>
        <h1>History pesananmu</h1>
        
        <span class="background">
            <span class="centering">
                <ul>
                    <?php
                    include_once(dirname(__DIR__) . "/template/HistoryCard.php");

                    $histories = $this->data;
                    ?>
                    <section class="articles">
                    <?php
                    // var_dump($histories);
                    $index = 1;
                    foreach ($histories as $history) {
                        history_card_template(
                            "Pesanan" . $index,
                            "Penerima: ".$history['nama_penerima'],
                            $history['rating'],
                            $history['id']);
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
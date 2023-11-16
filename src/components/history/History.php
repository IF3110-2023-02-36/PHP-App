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

                    // TODO : fetch data from REST
                    $histories = [
                        ['courierName' => "jamal", 'price' => 100, 'rating' => 4, 'historyId' => 1],
                        ['courierName' => "rusdi", 'price' => 69, 'rating' => 0, 'historyId' => 2],
                        ['courierName' => "Ukin", 'price' => 420, 'rating' => 3, 'historyId' => 3],
                    ];
                    ?>
                    <section class="articles">
                    <?php
                    foreach ($histories as $history) {
                        history_card_template(
                            $history['courierName'],
                            $history['price'],
                            $history['rating'],
                            $history['historyId']);
                    }
                    ?>
                    </section>
                </ul>
            </span>
        </span>
    </div>
</body>
</html>